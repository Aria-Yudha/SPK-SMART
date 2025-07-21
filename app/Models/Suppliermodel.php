<?php

namespace App\Models;

use CodeIgniter\Model;

class Suppliermodel extends Model
{
    protected $table = 'data_supplier';
    protected $primaryKey = 'id_supplier';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['id_supplier','kode_sup', 'nama_sup', 'nohp', 'alamat'];

    public function getsupplier($id_supplier)
    {
        return $this->where(['id_supplier' => $id_supplier])->first();
    }
    public function getActiveSuppliers()
    {
        // Ambil semua supplier (karena tidak ada kolom status)
        return $this->findAll();
    }
}
