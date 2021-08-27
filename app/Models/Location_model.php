<?php 

namespace App\Models;

use CodeIgniter\Model;

class Location_model extends Model
{
    protected $table = 'lokasi';
    protected $primaryKey =  'ID_LOKASI';
    protected $allowedFields = ['ID_LOKASI', 'BLOK', 'KETERANGAN_LOKASI'];

    public function getTotalLokasi(){
        return $this->db->table($this->table)
            ->selectCount('ID_LOKASI')
            ->get()->getResultArray()[0];
    }
}