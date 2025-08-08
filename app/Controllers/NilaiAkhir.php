<?php

namespace App\Controllers;

use App\Models\{Nilaiakhirmodel, Utilitymodel, Kriteriamodel, Suppliermodel, Parametermodel, Penilaianmodel};
use Dompdf\Dompdf;

class NilaiAkhir extends BaseController
{
    protected $Nilaiakhirmodel;
    protected $Utilitymodel;
    protected $Kriteriamodel;
    protected $Suppliermodel;

    protected $Parametermodel;

    protected $Penilaianmodel;

    public function __construct()
{
    $this->Nilaiakhirmodel = new Nilaiakhirmodel();
    $this->Utilitymodel    = new Utilitymodel();
    $this->Kriteriamodel   = new Kriteriamodel();
    $this->Suppliermodel   = new Suppliermodel();
    $this->Parametermodel  = new Parametermodel();
    $this->Penilaianmodel  = new Penilaianmodel();
}

public function index()
{
    $role = session()->get('role');

    if ($role === 'owner') {
        return $this->indexowner();
    }
{
    // Ambil daftar kriteria
    $kriteriaList = $this->Kriteriamodel->findAll();
    $kriteria = [];
    foreach ($kriteriaList as $k) {
        $kriteria[$k['id_kriteria']] = $k['nama_kriteria'];
    }

    // Ambil data nilai akhir sudah di-group dan diurutkan kode_sup
    $nilaiData = $this->Nilaiakhirmodel->getNilaiAkhirGrouped();

    // Buat array ranking berdasarkan total skor terbesar
    $rankingData = $nilaiData;
    usort($rankingData, function($a, $b) {
        return $b['total'] <=> $a['total'];
    });

    // Mapping id_supplier ke ranking
    $rankMap = [];
    $rank = 1;
    foreach ($rankingData as $rd) {
        $rankMap[$rd['id_supplier']] = $rank++;
    }

    // Pasang ranking ke $nilaiData (yang urut kode_sup)
    foreach ($nilaiData as &$nd) {
        $nd['ranking'] = $rankMap[$nd['id_supplier']] ?? null;
    }
    unset($nd);

    // ✅ Tambahkan $rankingData ke array data
    $data = [
        'title'        => 'Data Nilai Akhir',
        'kriteria'     => $kriteria,
        'nilai_akhir'  => $nilaiData,
        'ranking'      => $rankingData, // <- ini penting!
    ];

    return view('nilaiakhir/index', $data);
}
}

    public function indexowner()
    {
    // Ambil daftar kriteria
    $kriteriaList = $this->Kriteriamodel->findAll();
    $kriteria = [];
    foreach ($kriteriaList as $k) {
        $kriteria[$k['id_kriteria']] = $k['nama_kriteria'];
    }

    // Ambil data nilai akhir sudah di-group dan diurutkan kode_sup
    $nilaiData = $this->Nilaiakhirmodel->getNilaiAkhirGrouped();

    // Buat array ranking berdasarkan total skor terbesar
    $rankingData = $nilaiData;
    usort($rankingData, function($a, $b) {
        return $b['total'] <=> $a['total'];
    });

    // Mapping id_supplier ke ranking
    $rankMap = [];
    $rank = 1;
    foreach ($rankingData as $rd) {
        $rankMap[$rd['id_supplier']] = $rank++;
    }

    // Pasang ranking ke $nilaiData (yang urut kode_sup)
    foreach ($nilaiData as &$nd) {
        $nd['ranking'] = $rankMap[$nd['id_supplier']] ?? null;
    }
    unset($nd);

    // ✅ Tambahkan $rankingData ke array data
    $data = [
        'title'        => 'Data Nilai Akhir',
        'kriteria'     => $kriteria,
        'nilai_akhir'  => $nilaiData,
        'ranking'      => $rankingData, // <- ini penting!
    ];

    return view('nilaiakhir/indexowner', $data);
}


    public function hitung()
    {
        $this->Nilaiakhirmodel->hapusSemua();

        $utility  = $this->Utilitymodel->getUtilityWithDetail();
        $kriteria = $this->Kriteriamodel->getKriteriaWithBobot();

        $bobot = [];
        foreach ($kriteria as $k) {
            $bobot[$k['id_kriteria']] = isset($k['nilai_bobot']) ? ((float)$k['nilai_bobot'] / 100) : 0;
        }

        foreach ($utility as $u) {
            $id_supplier   = $u['id_supplier'];
            $id_kriteria   = $u['id_kriteria'];
            $id_utility    = $u['id_utility'];
            $nilai_utility = $u['nilai_utility'];

            $normalisasi_bobot = $bobot[$id_kriteria] ?? 0;
            $nilai_akhir       = $nilai_utility * $normalisasi_bobot;

            $this->Nilaiakhirmodel->save([
                'id_supplier' => $id_supplier,
                'id_kriteria' => $id_kriteria,
                'id_utility'  => $id_utility,
                'nilai_akhir' => $nilai_akhir,
            ]);
        }

        return redirect()->to('/nilaiakhir')->with('success', 'Perhitungan nilai akhir selesai.');
    }

    public function hapussemua()
    {
        $this->Nilaiakhirmodel->hapusSemua();
        return redirect()->to('/nilaiakhir')->with('success', 'Semua data nilai akhir berhasil dihapus.');
    }

    // ✅ Tambahan: Fungsi cetak PDF
    public function cetakpdf()
{
    require_once ROOTPATH . 'vendor/autoload.php';

    $kriteriaList = $this->Kriteriamodel->findAll();
    $kriteria = [];
    foreach ($kriteriaList as $k) {
        $kriteria[$k['id_kriteria']] = $k['nama_kriteria'];
    }

    $nilaiData = $this->Nilaiakhirmodel->getNilaiAkhirGrouped();

    $rankingData = $nilaiData;
    usort($rankingData, function($a, $b) {
        return $b['total'] <=> $a['total'];
    });

    $rankMap = [];
    $rank = 1;
    foreach ($rankingData as $rd) {
        $rankMap[$rd['id_supplier']] = $rank++;
    }

    foreach ($nilaiData as &$nd) {
        $nd['ranking'] = $rankMap[$nd['id_supplier']] ?? null;
    }
    unset($nd);

    // ✅ Tambahan: Ambil parameter dan penilaian dari supplier terbaik
    $id_supplier_terbaik = $rankingData[0]['id_supplier'] ?? null;
    $utility_terbaik     = $this->Utilitymodel->where('id_supplier', $id_supplier_terbaik)->findAll();

    $parameter_terbaik = [];
    foreach ($utility_terbaik as $u) {
        $penilaian = $this->Penilaianmodel->find($u['id_penilaian']);
        if ($penilaian) {
            $parameter = $this->Parametermodel->find($penilaian['id_parameter']);
            $kriteriax = $this->Kriteriamodel->find($penilaian['id_kriteria']);

            $parameter_terbaik[] = [
                'nama_kriteria'  => $kriteriax['nama_kriteria'] ?? '-',
                'nama_parameter' => $parameter['nama_parameter'] ?? '-',
                'keterangan'     => $parameter['keterangan'],
            ];
        }
    }

    $data = [
        'kriteria'           => $kriteria,
        'nilai_akhir'        => $nilaiData,
        'nama_user'          => session()->get('nama_user'),
        'parameter_terbaik'  => $parameter_terbaik, // ✅ tambahan untuk ditampilkan di view
    ];

    $dompdf = new Dompdf();
    $html = view('nilaiakhir/pdf', $data);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('Laporan_Nilai_Akhir.pdf', ['Attachment' => true]);
    exit;
}

}
