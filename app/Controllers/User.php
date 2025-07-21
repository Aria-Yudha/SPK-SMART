<?php

namespace App\Controllers;

use App\Models\Usermodel;

class User extends BaseController
{
    protected $Usermodel;

    public function __construct()
    {
        $this->Usermodel = new Usermodel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Daftar Nama User',
            'user' => $this->Usermodel->findAll()
        ];
        return view('user/index', $data);
    }

    public function tambah()
    {
        return view('user/tambah', ['title' => 'Form Tambah Data User']);
    }

    public function simpan()
    {
        $this->Usermodel->save([
            'nama_user' => $this->request->getVar('nama_user'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role'),
            'password'     => $this->request->getVar('password'),
        ]);
        return redirect()->to('/user');
    }

    public function hapus($id_user)
    {
        $this->Usermodel->delete($id_user);
        return redirect()->to('/user');
    }

    public function edit($id_user)
    {
        $data = [
            'title' => 'Form Ubah Data user',
            'user' => $this->Usermodel->getuser($id_user)
        ];
        return view('user/edit', $data);
    }

    public function ubah($id_user)
    {
        $this->Usermodel->save([
            'id_user'=> $id_user,
            'nama_user' => $this->request->getVar('nama_user'),
            'username' => $this->request->getVar('username'),
            'email'     => $this->request->getVar('email'),
            'role'   => $this->request->getVar('role'),
            'password'   => $this->request->getVar('password')
        ]);
        return redirect()->to('/user')->with('success', 'Data user berhasil diubah.');
    }
}
