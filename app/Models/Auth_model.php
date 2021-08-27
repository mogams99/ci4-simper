<?php
  
namespace App\Models;
  
use CodeIgniter\Model;
  
class Auth_model extends Model{
  
    protected $table = "pengguna";
    protected $primaryKey = "ID_USER";
  
    public function getLogin($username, $password)
    {
        return $this->db->table($this->table)->where(['USERNAME' => $username, 'PASSWORD' => $password])->get()->getRowArray();
    }
}