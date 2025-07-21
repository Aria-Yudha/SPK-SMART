<?php

namespace App\Models;

use CodeIgniter\Model;

class Utilitymodel extends Model
{
    protected $table = 'nilai_utility';
    protected $primaryKey = 'id_utility';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'id_supplier',
        'id_kriteria',
        'id_penilaian',
        'nilai_utility',
    ];

    public function getUtilityWithDetail()
    {
        return $this->select('nilai_utility.*, data_supplier.nama_sup, data_supplier.kode_sup, kriteria.nama_kriteria')
                    ->join('data_supplier', 'data_supplier.id_supplier = nilai_utility.id_supplier')
                    ->join('kriteria', 'kriteria.id_kriteria = nilai_utility.id_kriteria')
                    ->orderBy('nilai_utility.id_supplier, nilai_utility.id_kriteria')
                    ->findAll();
    }

    public function emptyTable()
{
    // Hapus semua isi tabel secara aman meskipun ada foreign key
    $this->db->table($this->table)->where('1=1')->delete();
}

}
