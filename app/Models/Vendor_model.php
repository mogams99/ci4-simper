<?php 

namespace App\Models;

use CodeIgniter\Model;

class Vendor_model extends Model
{
    protected $table = 'vendor';
    protected $primaryKey =  'ID_VENDOR';
    protected $allowedFields = ['ID_VENDOR', 'NAMA_VENDOR'];

    public function getTotalVendor(){
        return $this->db->table($this->table)
            ->selectCount('ID_VENDOR')
            ->get()->getResultArray()[0];
    }
}