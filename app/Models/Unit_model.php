<?php 

namespace App\Models;

use CodeIgniter\Model;

class Unit_model extends Model
{
    protected $table = 'satuan';
    protected $primaryKey =  'ID_SATUAN';
    protected $allowedFields = ['ID_SATUAN', 'SATUAN', 'NOTASI'];

    public function getTotalSatuan(){
        return $this->db->table($this->table)
            ->selectCount('ID_SATUAN')
            ->get()->getResultArray()[0];
    }

}