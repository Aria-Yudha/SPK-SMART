<?php

namespace App\Controllers;

use App\Models\Parametermodel;
use App\Models\Kriteriamodel;

class Parameter extends BaseController
{
    protected $Parametermodel;

    public function __construct()
    {
        $this->Parametermodel = new Parametermodel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Daftar Nilai Parameter',
            'parameter' => $this->Parametermodel->getparameterWithkriteria()
        ];
        return view('parameter/index', $data);
    }

    public function tambah()
    {
        $Kriteriamodel = new Kriteriamodel();

        $data = [
            'title' => 'Form Tambah Data Nilai Parameter',
            'kriteria' => $Kriteriamodel->findAll()
        ];

        return view('parameter/tambah', $data);
    }

    public function simpan()
{
    $parameterModel = new \App\Models\Parametermodel();

    $id_kriteria = $this->request->getVar('id_kriteria');  // Tangkap id_kriteria dari form
    $nilai_parameters = $this->request->getVar('nilai_parameter'); // array
    $keterangans = $this->request->getVar('keterangan'); // array

    // Validasi sederhana
    if (!is_array($nilai_parameters) || !is_array($keterangans) || empty($id_kriteria)) {
        return redirect()->back()->with('error', 'Input parameter tidak valid');
    }

    foreach ($nilai_parameters as $i => $nilai) {
        $parameterModel->save([
            'id_kriteria' => $id_kriteria,
            'nilai_parameter' => $nilai,
            'keterangan' => $keterangans[$i]
        ]);
    }

    return redirect()->to('/parameter')->with('success', 'Data parameter berhasil ditambahkan.');
}


    public function hapus($id_parameter)
    {
        $this->Parametermodel->delete($id_parameter);
        return redirect()->to('/parameter');
    }

    public function edit($id_parameter)
    {
        $Kriteriamodel = new Kriteriamodel();
        $data = [
            'title' => 'Form Ubah Data Parameter',
            'parameter' => $this->Parametermodel->getparameter($id_parameter),
            'kriteria' => $Kriteriamodel->findAll()
        ];
        return view('parameter/edit', $data);
    }

    public function ubah($id_parameter)
{
    $this->Parametermodel->save([
        'id_parameter' => $id_parameter,
        'id_kriteria' => $this->request->getVar('id_kriteria'), // tambahkan ini
        'nilai_parameter' => $this->request->getVar('nilai_parameter'),
        'keterangan'     => $this->request->getVar('keterangan')
    ]);
    return redirect()->to('/parameter')->with('success', 'Data Parameter berhasil diubah.');
}

}
