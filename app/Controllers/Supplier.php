<?php

namespace App\Controllers;

use App\Models\Suppliermodel;

class Supplier extends BaseController
{
    protected $Suppliermodel;

    public function __construct()
    {
        $this->Suppliermodel = new Suppliermodel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Daftar Nama Supplier',
            'supplier' => $this->Suppliermodel->findAll()
        ];
        return view('supplier/index', $data);
    }

    public function tambah()
    {
        return view('supplier/tambah', ['title' => 'Form Tambah Data Supplier']);
    }

    public function simpan()
    {
        $this->Suppliermodel->save([
            'id_supplier' => $this->request->getVar('id_supplier'),
            'kode_sup' => $this->request->getVar('kode_sup'),
            'nama_sup' => $this->request->getVar('nama_sup'),
            'nohp'     => $this->request->getVar('nohp'),
            'alamat'   => $this->request->getVar('alamat')
        ]);
        return redirect()->to('/supplier');
    }

    public function hapus($id_supplier)
    {
        $this->Suppliermodel->delete($id_supplier);
        return redirect()->to('/supplier');
    }

    public function edit($id_supplier)
    {
        $data = [
            'title' => 'Form Ubah Data Supplier',
            'supplier' => $this->Suppliermodel->getsupplier($id_supplier)
        ];
        return view('supplier/edit', $data);
    }

    public function ubah($id_supplier)
    {
        $this->Suppliermodel->save([
            'id_supplier'=> $id_supplier,
            'kode_sup' => $this->request->getVar('kode_sup'),
            'nama_sup' => $this->request->getVar('nama_sup'),
            'nohp'     => $this->request->getVar('nohp'),
            'alamat'   => $this->request->getVar('alamat')
        ]);
        return redirect()->to('/supplier')->with('success', 'Data supplier berhasil diubah.');
    }
}
