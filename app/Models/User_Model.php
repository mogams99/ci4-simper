<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey =  'ID_USER';
    protected $allowedFields = ['NAMA', 'JABATAN', 'PHONE', 'EMAIL', 'USERNAME', 'PASSWORD'];
}
