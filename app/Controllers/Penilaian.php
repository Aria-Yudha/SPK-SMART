<?php

namespace App\Controllers;

use App\Models\Penilaianmodel;
use App\Models\Suppliermodel;
use App\Models\Kriteriamodel;
use App\Models\Parametermodel;

class Penilaian extends BaseController
{
    protected $Penilaianmodel;

    public function __construct()
    {
        $this->Penilaianmodel = new Penilaianmodel();
    }

    public function index(): string
    {
        $penilaian = $this->Penilaianmodel->getPenilaianWithDetail();

        // Mengelompokkan berdasarkan supplier dan kriteria
        $dataPenilaian = [];
        $kriteriaList = [];

        foreach ($penilaian as $p) {
            $dataPenilaian[$p['id_supplier']]['nama_sup'] = $p['nama_sup'];
            $dataPenilaian[$p['id_supplier']]['kode_supplier'] = $p['kode_sup'];
            $dataPenilaian[$p['id_supplier']]['nilai'][$p['id_kriteria']] = $p['nilai'];
            $kriteriaList[$p['id_kriteria']] = $p['nama_kriteria'];
        }

        $data = [
            'title' => 'Data Penilaian Supplier',
            'penilaian' => $dataPenilaian,
            'kriteria' => $kriteriaList
        ];

        return view('penilaian/index', $data);
    }

    public function tambah()
    {
        $Suppliermodel = new Suppliermodel();
        $Kriteriamodel = new Kriteriamodel();
        $Parametermodel = new Parametermodel();

        $data = [
            'title' => 'Form Tambah Penilaian',
            'supplier' => $Suppliermodel->findAll(),
            'kriteria' => $Kriteriamodel->findAll(),
            'parameter' => $Parametermodel->findAll()
        ];

        return view('penilaian/tambah', $data);
    }

    public function simpan()
    {
        $id_supplier = $this->request->getPost('id_supplier');
        $id_kriteria = $this->request->getPost('id_kriteria');       // array
        $id_parameter = $this->request->getPost('id_parameter');     // array

        // Validasi sederhana
        if (!$id_supplier || !is_array($id_kriteria) || !is_array($id_parameter)) {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        // Hapus data penilaian lama untuk supplier ini agar tidak terjadi duplikasi
        $this->Penilaianmodel->where('id_supplier', $id_supplier)->delete();

        foreach ($id_kriteria as $i => $idk) {
            $this->Penilaianmodel->save([
                'id_supplier' => $id_supplier,
                'id_kriteria' => $idk,
                'id_parameter' => $id_parameter[$i]
            ]);
        }

        return redirect()->to('/penilaian')->with('success', 'Data penilaian berhasil disimpan.');
    }

    public function hapus($id_supplier)
    {
        $this->Penilaianmodel->where('id_supplier', $id_supplier)->delete();
        return redirect()->to('/penilaian')->with('success', 'Data penilaian berhasil dihapus.');
    }

    public function edit($id_supplier)
    {
        $Kriteriamodel = new Kriteriamodel();
        $Suppliermodel = new Suppliermodel();
        $Parametermodel = new Parametermodel();

        $penilaian = $this->Penilaianmodel->where('id_supplier', $id_supplier)->findAll();

        if (!$penilaian) {
            return redirect()->to('/penilaian')->with('error', 'Data tidak ditemukan.');
        }

         // Ambil nama supplier
    $supplier = $Suppliermodel->find($id_supplier);
    if (!$supplier) {
        return redirect()->to('/penilaian')->with('error', 'Supplier tidak ditemukan.');
    }

        $data = [
            'title' => 'Form Ubah Penilaian Supplier',
            'id_supplier' => $id_supplier,
            'supplier' => $Suppliermodel->findAll(),
            'kriteria' => $Kriteriamodel->findAll(),
            'parameter' => $Parametermodel->findAll(),
            'penilaian' => $penilaian
        ];

        return view('penilaian/edit', $data);
    }

    public function ubah($id_supplier)
    {
        $id_kriteria = $this->request->getPost('id_kriteria');
        $id_parameter = $this->request->getPost('id_parameter');

        // Validasi
        if (!$id_supplier || !is_array($id_kriteria) || !is_array($id_parameter)) {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        // Hapus data lama
        $this->Penilaianmodel->where('id_supplier', $id_supplier)->delete();

        // Simpan data baru
        foreach ($id_kriteria as $i => $idk) {
            $this->Penilaianmodel->save([
                'id_supplier' => $id_supplier,
                'id_kriteria' => $idk,
                'id_parameter' => $id_parameter[$i]
            ]);
        }

        return redirect()->to('/penilaian')->with('success', 'Data penilaian berhasil diubah.');
    }
}
