<?php
namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Stmt\DeclareDeclare;
use function PHPUnit\Framework\isNull;

class Product_model extends Model
{
    protected $table = 'barang';
    protected $primaryKey =  'ID_BARANG';
    protected $allowedFields = ['ID_BARANG', 'ID_SATUAN', 'ID_LOKASI', 'ID_KATEGORI', 'NAMA_BARANG', 'STOK', 'MINIMAL_BARANG', 'KETERANGAN_BARANG', 'HARGA_BARANG'];

    public function getProduk()
    {
         return $this->db->table('barang')
         ->join('satuan','satuan.ID_SATUAN=barang.ID_SATUAN')
         ->join('lokasi', 'lokasi.ID_LOKASI=barang.ID_LOKASI')
         ->join('kategori', 'kategori.ID_KATEGORI=barang.ID_KATEGORI')
         ->groupBy('barang.ID_BARANG')
         ->get()->getResultArray();
    }

    public function getProdukDetail($id_barang){
        return $this->db->table('barang')
            ->join('satuan','satuan.ID_SATUAN=barang.ID_SATUAN')
            ->join('lokasi', 'lokasi.ID_LOKASI=barang.ID_LOKASI')
            ->join('kategori', 'kategori.ID_KATEGORI=barang.ID_KATEGORI')
            ->where('ID_BARANG',$id_barang)
            ->get()->getResultArray();
    }

    public function getKodeProduk($id_kategori){
        $kodebrg = 0;
        $lastkodebrg = $this->db->table('barang')
            ->selectMax('ID_BARANG')
            ->where('ID_KATEGORI', $id_kategori)->get()->getRowArray()['ID_BARANG'];
        if (is_null($lastkodebrg)){
            $kode = $this->db->table('kategori')
                ->select('PREFIX_KATEGORI')
                ->where('ID_KATEGORI',$id_kategori)->get()->getRowArray()['PREFIX_KATEGORI'];
            $kodebrg = $kode.'0001';

        } else {
            $kodebrg = ++$lastkodebrg;
        }
        return $kodebrg;
    }

    public function updateID($old_id, $new_id){
        $this->db->table('barang')
            ->set('ID_BARANG', $new_id, false)
            ->where('ID_BARANG', $old_id)
            ->update();

    }

    public function incrementStok($id_brg, $jumlah){
        $this->db->table($this->table)
            ->where($this->primaryKey, $id_brg)
            ->set('STOK', 'STOK+'.$jumlah, false)
            ->update();
    }

    public function decrementStok($id_brg, $jumlah){
        $this->db->table($this->table)
            ->where($this->primaryKey, $id_brg)
            ->set('STOK', 'STOK-'.$jumlah, false)
            ->update();
    }

    public function isOutOfStock($idbrg, $jumlahnrg){
        $result = $this->db->table($this->table)
             ->select('STOK,MINIMAL_BARANG' )
             ->where('ID_BARANG', $idbrg)
            ->get()->getResultArray()[0];
            return $result['STOK']-$jumlahnrg<$result['MINIMAL_BARANG'];
    }

    public function getTotalStok(){
        return $this->db->table($this->table)
            ->selectCount('ID_BARANG')
            ->get()->getResultArray()[0];
    }

    public function getHargaTotalSisaStok(){
        $query =  $this->db->query("Select Sum(STOK*HARGA_BARANG) as stockvalue from barang");
        return $query->getRow()->stockvalue;
    }

    public function getById($id_brg){
        $result = $this->db->table($this->table)
            ->select('NAMA_BARANG' )
            ->where('ID_BARANG', $id_brg)
            ->first();
    }
}