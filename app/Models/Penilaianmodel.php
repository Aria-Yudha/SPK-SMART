<?php

namespace App\Models;

use CodeIgniter\Model;

class Penilaianmodel extends Model
{
    protected $table = 'penilaian';
    protected $primaryKey = 'id_penilaian';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;

    protected $allowedFields = ['id_supplier', 'id_kriteria', 'id_parameter'];

    // Ambil semua data penilaian lengkap dengan nama supplier, nama kriteria, dan keterangan parameter
    public function getPenilaianWithDetail()
{
    return $this->select('penilaian.*, data_supplier.nama_sup, data_supplier.kode_sup, kriteria.nama_kriteria, parameter.nilai_parameter AS nilai')
                ->join('data_supplier', 'data_supplier.id_supplier = penilaian.id_supplier')
                ->join('kriteria', 'kriteria.id_kriteria = penilaian.id_kriteria')
                ->join('parameter', 'parameter.id_parameter = penilaian.id_parameter')
                ->orderBy('penilaian.id_supplier, penilaian.id_kriteria')
                ->findAll();
}


    // Ambil satu data penilaian berdasarkan ID
    public function getPenilaian($id_penilaian)
    {
        return $this->where(['id_penilaian' => $id_penilaian])->first();
    }
}
