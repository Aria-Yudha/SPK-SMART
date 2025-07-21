<?php

namespace App\Models;

use CodeIgniter\Model;

class Kriteriamodel extends Model
{
    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $useAutoIncrement = false;
    protected $useTimestamps = false;
    protected $allowedFields = ['id_kriteria','nama_kriteria','kd_kriteria','jenis_kriteria','id_bobot'];

    public function getKriteriaWithBobot()
{
    return $this->select('kriteria.*, bobot.nilai_bobot')
                ->join('bobot', 'bobot.id_bobot = kriteria.id_bobot')
                ->findAll();
}
 public function getkriteria($id_kriteria)
    {
        return $this->where(['id_kriteria' => $id_kriteria])->first();
    }

}

