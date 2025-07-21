<?php

namespace App\Models;

use CodeIgniter\Model;

class Usermodel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    
    protected $useAutoIncrement = 'true';
    protected $allowedFields = ['nama_user','username','email','role','password'];
     
    public function getuser($id_user)
    {
        return $this->where(['id_user' => $id_user])->first();
    }
}