<?php


namespace App\Models;


class LogPengguna_model extends \CodeIgniter\Model
{
    protected $table = 'log_pengguna';
    protected $primaryKey =  'id_log';
    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_LOG';
    protected $allowedFields = ['id_user', 'id_transaksi', 'keterangan_log'];

    public function getAllLog(){
        return $this->db->table($this->table)
            ->join('pengguna', 'pengguna.ID_USER = log_pengguna.ID_USER')
            ->get()->getResultArray();
    }
}