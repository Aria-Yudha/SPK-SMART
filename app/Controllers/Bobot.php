<?php

namespace App\Controllers;

use App\Models\Bobotmodel;

class Bobot extends BaseController
{
    protected $Bobotmodel;
    public function __construct()
    {
        $this->Bobotmodel = new Bobotmodel();
    }
    public function index(): string
    {
        $bobot = $this->Bobotmodel->findAll();
        
        $data = [
            'title' => 'Daftar Bobot',
            'bobot' => $bobot
        ];
        
        return view('bobot/index', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Form Tambah Data Bobot'
        ];

        return view('bobot/tambah', $data);
    }

    public function simpan()
    {
       $this->Bobotmodel->save([
        'id_bobot' => $this->request->getVar('id_bobot'),
        'nilai_bobot' => $this->request->getVar('nilai_bobot'),
        'keterangan' => $this->request->getVar('keterangan'),
       ]);
       
       return redirect()->to('/bobot');
    }


    public function hapus($id_bobot)
    {
        $this->Bobotmodel->delete($id_bobot);
        return redirect()->to('/bobot');
    }

    public function edit($id_bobot)
    {
        $data = [
            'title' => 'Form Ubah Data Bobot',
            'bobot' => $this->Bobotmodel->getbobot($id_bobot)
        ];
        return view('bobot/edit', $data);
    }

    public function ubah($id_bobot)
    {
        $this->Bobotmodel->save([
            'id_bobot' => $id_bobot,
            'nilai_bobot' => $this->request->getVar('nilai_bobot'),
            'keterangan'     => $this->request->getVar('keterangan'),
            
        ]);
        return redirect()->to('/bobot')->with('success', 'Data bobot berhasil diubah.');
    }
    
}
