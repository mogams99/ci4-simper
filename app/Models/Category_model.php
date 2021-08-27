<?php 

namespace App\Models;

use CodeIgniter\Model;

class Category_model extends Model
{
    protected $table = 'kategori';
    protected $primaryKey =  'ID_KATEGORI';
    protected $allowedFields = ['ID_KATEGORI', 'NAMA_KATEGORI', 'PREFIX_KATEGORI'];

    public function getTotalKategori(){
        return $this->db->table($this->table)
            ->selectCount('ID_KATEGORI')
            ->get()->getResultArray()[0];
    }
}