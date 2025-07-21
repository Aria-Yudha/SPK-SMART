<?php

namespace App\Models;

use CodeIgniter\Model;

class Bobotmodel extends Model
{
    protected $table = 'bobot';
    protected $primaryKey = 'id_bobot';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['id_bobot','nilai_bobot','keterangan'];
     public function getbobot($id_bobot)
    {
        return $this->where(['id_bobot' => $id_bobot])->first();
    }
}