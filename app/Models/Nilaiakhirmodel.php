<?php

namespace App\Models;

use CodeIgniter\Model;

class Nilaiakhirmodel extends Model
{
    protected $table = 'nilai_akhir';
    protected $primaryKey = 'id_nilaiakhir';
    protected $allowedFields = ['id_supplier', 'id_kriteria', 'id_utility', 'nilai_akhir'];

    public function hapusSemua()
    {
        $this->where('id_nilaiakhir IS NOT NULL')->delete();
    }


    public function getNilaiAkhirGrouped()
{
    $data = $this->select('nilai_akhir.*, data_supplier.id_supplier, data_supplier.kode_sup, data_supplier.nama_sup, kriteria.id_kriteria, kriteria.nama_kriteria')
        ->join('data_supplier', 'data_supplier.id_supplier = nilai_akhir.id_supplier')
        ->join('kriteria', 'kriteria.id_kriteria = nilai_akhir.id_kriteria')
        ->orderBy('data_supplier.kode_sup', 'ASC')
        ->findAll();

    $result = [];
    foreach ($data as $row) {
        $id_supplier = $row['id_supplier'];
        $id_kriteria = $row['id_kriteria'];

        if (!isset($result[$id_supplier])) {
            $result[$id_supplier] = [
                'id_supplier' => $id_supplier,  // Penting untuk mapping ranking
                'kode_sup' => $row['kode_sup'],
                'nama_sup' => $row['nama_sup'],
                'nilai' => [],
                'total' => 0
            ];
        }

        $result[$id_supplier]['nilai'][$id_kriteria] = $row['nilai_akhir'];
        $result[$id_supplier]['total'] += $row['nilai_akhir'];
    }

    return array_values($result);
}

    public function getRanking()
{
    return $this->db->table('nilai_akhir')
        ->select('data_supplier.nama_sup, SUM(nilai_akhir.nilai_akhir) as total_nilai')
        ->join('data_supplier', 'data_supplier.id_supplier = nilai_akhir.id_supplier')
        ->groupBy('nilai_akhir.id_supplier')
        ->orderBy('total_nilai', 'DESC')
        ->get()
        ->getResultArray();
}

}
