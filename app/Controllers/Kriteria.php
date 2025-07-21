<?php

namespace App\Controllers;

use App\Models\Kriteriamodel;
use App\Models\Bobotmodel;

class Kriteria extends BaseController
{
    protected $Kriteriamodel;

    public function __construct()
    {
        $this->Kriteriamodel = new Kriteriamodel();
    }

    public function index(): string
    {
        $kriteria = $this->Kriteriamodel->getKriteriaWithBobot();
        $totalKriteria = $this->Kriteriamodel->countAll(); // Jika ingin menampilkan total

        $data = [
            'title' => 'Daftar Kriteria',
            'kriteria' => $kriteria,
            'totalKriteria' => $totalKriteria
        ];

        return view('kriteria/index', $data);
    }

    public function tambah()
    {
        $bobotModel = new Bobotmodel();

        $data = [
            'title' => 'Form Tambah Data Kriteria',
            'bobot' => $bobotModel->findAll()
        ];

        return view('kriteria/tambah', $data);
    }

    public function simpan()
    {
        // Validasi input (opsional tapi disarankan)
        if (!$this->validate([
            'id_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'kd_kriteria' => 'required',
            'jenis_kriteria' => 'required',
            'id_bobot' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Semua field harus diisi.');
        }

        $this->Kriteriamodel->save([
            'id_kriteria' => $this->request->getVar('id_kriteria'),
            'nama_kriteria' => $this->request->getVar('nama_kriteria'),
            'kd_kriteria' => $this->request->getVar('kd_kriteria'),
            'jenis_kriteria' => $this->request->getVar('jenis_kriteria'),
            'id_bobot' => $this->request->getVar('id_bobot'),
        ]);

        return redirect()->to('/kriteria')->with('success', 'Data kriteria berhasil disimpan.');
    }

    public function hapus($id_kriteria)
    {
        $this->Kriteriamodel->delete($id_kriteria);
        return redirect()->to('/kriteria')->with('success', 'Data kriteria berhasil dihapus.');
    }

    public function edit($id_kriteria)
    {
        $bobotModel = new Bobotmodel();
        $data = [
            'title' => 'Form Ubah Data Kriteria',
            'kriteria' => $this->Kriteriamodel->getkriteria($id_kriteria),
            'bobot' => $bobotModel->findAll()
        ];
        return view('kriteria/edit', $data);
    }

    public function ubah($id_kriteria)
    {
        $this->Kriteriamodel->save([
            'id_kriteria' => $id_kriteria,
            'nama_kriteria' => $this->request->getVar('nama_kriteria'),
            'kd_kriteria' => $this->request->getVar('kd_kriteria'),
            'jenis_kriteria'     => $this->request->getVar('jenis_kriteria'),
            'id_bobot'   => $this->request->getVar('id_bobot')
        ]);
        return redirect()->to('/kriteria')->with('success', 'Data kriteria berhasil diubah.');
    }
}
