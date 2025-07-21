<?php

namespace App\Controllers;

use App\Models\Kriteriamodel;
use App\Models\Suppliermodel;
use App\Models\Nilaiakhirmodel;
use App\Models\Parametermodel;

class Dashboard extends BaseController
{
    public function index()
{
    if (!session()->get('logged_in')) {
        return view('dashboard/umum');
    }

    // Khusus admin
    if (session()->get('role') !== 'admin') {
        return redirect()->to('/dashboard/indexowner');
    }

    $Suppliermodel = new Suppliermodel();
    $totalsupplier = $Suppliermodel->countAll();
    $kriteriaModel = new Kriteriamodel();
    $totalKriteria = $kriteriaModel->countAll();
    $Parametermodel = new Parametermodel();
    $totalParameter = $Parametermodel->countAll();

    $nilaiAkhirModel = new Nilaiakhirmodel();
    $ranking = $nilaiAkhirModel->getRanking();
    $supplierTerbaik = (!empty($ranking)) ? $ranking[0]['nama_sup'] : 'Belum Ada';

    $data = [
        'title' => 'Sistem Pemilihan Supplier Terbaik',
        'totalKriteria' => $totalKriteria,
        'totalsupplier' => $totalsupplier,
        'totalParameter' => $totalParameter,
        'supplierTerbaik' => $supplierTerbaik,
        'ranking' => $ranking,
    ];

    return view('dashboard/admin', $data);
}

public function indexowner()
{
    $nilaiAkhirModel = new Nilaiakhirmodel();
    $ranking = $nilaiAkhirModel->getRanking();

    $supplierNames = array_map(fn($r) => $r['nama_sup'], $ranking);
    $supplierScores = array_map(fn($r) => (float)$r['total_nilai'], $ranking);
    $topSuppliers = array_slice($ranking, 0, 3);

    // Ambil supplier aktif dari model Supplier
    $Suppliermodel = new Suppliermodel();
    // Misal status 'aktif' ditandai dengan kolom 'status' = 'aktif'
     $activeSuppliers = $Suppliermodel->getActiveSuppliers();


    // KPI dummy (bisa diisi sesuai data asli)
    $totalTransaksi = 0;
    $totalPembelian = 0;
    $persentasePengiriman = 0;

    return view('dashboard/owner', [
        'ranking' => $ranking,
        'supplierNames' => $supplierNames,
        'supplierScores' => $supplierScores,
        'topSuppliers' => $topSuppliers,
        'supplierAktif' => $activeSuppliers,
        'totalTransaksi' => $totalTransaksi,
        'jumlahSupplier' => count($activeSuppliers), // jumlah supplier aktif
        'totalPembelian' => $totalPembelian,
        'persentasePengiriman' => $persentasePengiriman,
    ]);
}


}
