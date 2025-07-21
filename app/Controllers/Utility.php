<?php

namespace App\Controllers;

use App\Models\Utilitymodel;
use App\Models\Penilaianmodel;
use App\Models\Suppliermodel;
use App\Models\Kriteriamodel;

class Utility extends BaseController
{
    protected $Utilitymodel;
    protected $Penilaianmodel;
    protected $Suppliermodel;
    protected $Kriteriamodel;

    public function __construct()
    {
        $this->Utilitymodel = new Utilitymodel();
        $this->Penilaianmodel = new Penilaianmodel();
        $this->Suppliermodel = new Suppliermodel();
        $this->Kriteriamodel = new Kriteriamodel();
    }

    public function index(): string
    {
        $utility = $this->Utilitymodel->getUtilityWithDetail();

        $dataUtility = [];
        $kriteriaList = [];

        foreach ($utility as $u) {
            $dataUtility[$u['id_supplier']]['nama_sup'] = $u['nama_sup'];
            $dataUtility[$u['id_supplier']]['kode_supplier'] = $u['kode_sup'];
            $dataUtility[$u['id_supplier']]['nilai'][$u['id_kriteria']] = $u['nilai_utility'];
            $kriteriaList[$u['id_kriteria']] = $u['nama_kriteria'];
        }

        $data = [
            'title' => 'Data Nilai Utility',
            'utility' => $dataUtility,
            'kriteria' => $kriteriaList,
        ];

        return view('utility/index', $data);
    }

    public function hitung()
    {
        $penilaian = $this->Penilaianmodel->getPenilaianWithDetail();
        $kriteria = $this->Kriteriamodel->findAll();

        // Kelompokkan nilai per kriteria
        $nilaiPerKriteria = [];
        foreach ($penilaian as $p) {
            $nilaiPerKriteria[$p['id_kriteria']][] = floatval($p['nilai']);
        }

        // Cari nilai max dan min per kriteria
        $nilaiMaxMin = [];
        foreach ($nilaiPerKriteria as $id_kriteria => $nilaiList) {
            $nilaiMaxMin[$id_kriteria]['max'] = max($nilaiList);
            $nilaiMaxMin[$id_kriteria]['min'] = min($nilaiList);
        }

        // Kosongkan tabel utility sebelum insert baru
        $this->Utilitymodel->emptyTable();

        // Hitung nilai utility
        foreach ($penilaian as $p) {
            $id_kriteria = $p['id_kriteria'];
            $nilai = floatval($p['nilai']);
            $max = $nilaiMaxMin[$id_kriteria]['max'];
            $min = $nilaiMaxMin[$id_kriteria]['min'];

            $jenis_kriteria = null;
            foreach ($kriteria as $k) {
                if ($k['id_kriteria'] == $id_kriteria) {
                    $jenis_kriteria = strtolower(trim($k['jenis_kriteria']));
                    break;
                }
            }

            // Pastikan denominator tidak nol
            if ($max == $min) {
                $utilityValue = 1.0;
            } else {
                if ($jenis_kriteria === 'benefit') {
                    $utilityValue = ($nilai - $min) / ($max - $min);
                } elseif ($jenis_kriteria === 'cost') {
                    $utilityValue = ($max - $nilai) / ($max - $min);
                } else {
                    $utilityValue = 0;
                }
            }

            // Simpan hasil utility (4 desimal)
            $this->Utilitymodel->save([
                'id_supplier' => $p['id_supplier'],
                'id_kriteria' => $id_kriteria,
                'id_penilaian' => $p['id_penilaian'],
                'nilai_utility' => round($utilityValue, 4),
            ]);
        }

        return redirect()->to('/utility')->with('success', 'Nilai utility berhasil dihitung dan disimpan.');
    }

    public function hapus($id_utility)
    {
        $this->Utilitymodel->delete($id_utility);
        return redirect()->to('/utility')->with('success', 'Data utility berhasil dihapus.');
    }

    public function hapussemua()
{
    $utilityData = $this->Utilitymodel->findAll();
    if (empty($utilityData)) {
        return redirect()->back()->with('error', 'Nilai Utility belum dihitung.');
    }
    $this->Utilitymodel->emptyTable();
    return redirect()->to('/utility')->with('success', 'Semua data utility berhasil dihapus.');
}

}
