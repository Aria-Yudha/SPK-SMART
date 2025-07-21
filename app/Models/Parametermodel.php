<?php

namespace App\Models;

use CodeIgniter\Model;

class Parametermodel extends Model
{
    protected $table = 'parameter';
    protected $primaryKey = 'id_parameter';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['id_kriteria', 'nilai_parameter', 'keterangan'];

    public function getparameterWithkriteria()
    {
        return $this->select('parameter.*, kriteria.nama_kriteria')
                    ->join('kriteria', 'kriteria.id_kriteria = parameter.id_kriteria')
                    ->findAll();
    }

    public function getparameter($id_parameter)
    {
        return $this->where(['id_parameter' => $id_parameter])->first();
    }
}
