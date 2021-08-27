<?php 

namespace App\Models;

use CodeIgniter\Model;
use PHPUnit\Framework\Constraint\IsFalse;

class Transac_model extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey =  'ID_TRANSAKSI';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField  = 'CREATED_T';
    protected $updatedField  = 'MODIFIED_T';
    protected $deletedField = 'DELETED_T';
    protected $allowedFields = ['ID_TRANSAKSI' , 'ID_BARANG', 'ID_VENDOR', 'JUMLAH_BARANG', 'KETERANGAN_TRANSAKSI', 'DATE_IN', 'DATE_OUT',  'TOTAL_HARGA', 'TIPE_TRANSAKSI'];

    public function getTransaksiMasuk()
    {
        $condition = ['transaksi.DATE_IN !=' => null, 'DELETED_T = ' => null];
         return $this->db->table('transaksi')
         ->join('barang','barang.ID_BARANG=transaksi.ID_BARANG', 'left')
         ->join('lokasi', 'lokasi.ID_LOKASI=barang.ID_LOKASI', 'left')
         ->join('vendor', 'vendor.ID_VENDOR=transaksi.ID_VENDOR', 'left')
         ->join('satuan', 'satuan.ID_SATUAN=barang.ID_SATUAN', 'left')
         ->where($condition)
         ->groupBy('transaksi.ID_TRANSAKSI')
         ->get()->getResultArray();  
    }

    public function getTransaksiKeluar()
    {
        $condition = ['transaksi.DATE_OUT !=' => null, 'DELETED_T ='=>null];
        return $this->db->table('transaksi')
        ->join('barang','barang.ID_BARANG=transaksi.ID_BARANG', 'left')
        ->join('lokasi', 'lokasi.ID_LOKASI=barang.ID_LOKASI', 'left')
        ->join('vendor', 'vendor.ID_VENDOR=transaksi.ID_VENDOR', 'left')
        ->join('satuan', 'satuan.ID_SATUAN=barang.ID_SATUAN', 'left')
        ->where($condition)
        ->groupBy('transaksi.ID_TRANSAKSI')
        ->get()->getResultArray();  
    }

    public function getKodeTransaksiMasuk(){
        $kodeTrx = 0;
        $lastTrxKode = $this->db->table('transaksi')
            ->selectMax('ID_TRANSAKSI')
            ->where('DATE_OUT',null)->get()->getRowArray()['ID_TRANSAKSI'];
        if (is_null($lastTrxKode)){
            $kodeTrx = "TM0001";
        } else {
            $kodeTrx = ++$lastTrxKode;
        }
        return $kodeTrx;
    }

    public function getKodeTransaksiKeluar(){
        $kodeTrx = 0;
        $lastTrxKode = $this->db->table('transaksi')
            ->selectMax('ID_TRANSAKSI')
            ->where('DATE_IN',null)->get()->getRowArray()['ID_TRANSAKSI'];
        if (is_null($lastTrxKode)){
            $kodeTrx = "TK0001";
        } else {
            $kodeTrx = ++$lastTrxKode;
        }
        return $kodeTrx;
    }

    public function getDetailTransaksi($jenis, $idTrx){
        switch ($jenis){
            case "masuk":
                $arraycondition = array('transaksi.ID_TRANSAKSI' => $idTrx, 'transaksi.DATE_OUT' => NULL);
                return $this->db->table($this->table)
                    ->join('barang', 'barang.ID_BARANG = transaksi.ID_BARANG')
                    ->join('satuan', 'satuan.ID_SATUAN = barang.ID_SATUAN')
                    ->join('lokasi', 'lokasi.ID_LOKASI = barang.ID_LOKASI')
                    ->where($arraycondition)
                    ->get()->getResultArray()[0];
                break;

            case "keluar":
                $arraycondition = array('transaksi.ID_TRANSAKSI' => $idTrx, 'transaksi.DATE_IN' => NULL);
                return $this->db->table($this->table)
                    ->join('barang', 'barang.ID_BARANG = transaksi.ID_BARANG')
                    ->join('satuan', 'satuan.ID_SATUAN = barang.ID_SATUAN')
                    ->join('lokasi', 'lokasi.ID_LOKASI = barang.ID_LOKASI')
                    ->where($arraycondition)
                    ->get()->getResultArray()[0];
                break;
        }
    }

    public function getTotalBarangMasuk(){
        $condition = ['DATE_OUT' => null,  'DELETED_T' => null];
        return $this->db->table($this->table)
            ->selectSum('JUMLAH_BARANG')
            ->where($condition)
            ->get()->getResultArray()[0];
    }

    public function getTotalBarangKeluar(){
        $condition = ['DATE_IN' => null,  'DELETED_T' => null];
        return $this->db->table($this->table)
            ->selectSum('JUMLAH_BARANG')
            ->where('DATE_IN', null)
            ->get()->getResultArray()[0];
    }

    public function getTotalHargaBrgMasuk(){
        $condition = ['DATE_OUT' => null, 'DELETED_T' => null];
        return $this->db->table($this->table)
            ->selectSum('TOTAL_HARGA')
            ->where($condition)
            ->get()->getResultArray()[0];
    }

    public function getTotalHargaBrgKeluar(){
        $condition = ['DATE_IN' => null, 'DELETED_T' => null];
        return $this->db->table($this->table)
            ->selectSum('TOTAL_HARGA')
            ->where($condition)
            ->get()->getResultArray()[0];
    }

    public function getTransaksiMasukByDate($date){
        $date = new \DateTime($date);
        $condition = ['transaksi.DATE_IN' => $date->format('Y-m-d'), 'DELETED_T = ' => null];
        return $this->db->table('transaksi')
            ->join('barang','barang.ID_BARANG=transaksi.ID_BARANG', 'left')
            ->join('lokasi', 'lokasi.ID_LOKASI=barang.ID_LOKASI', 'left')
            ->join('vendor', 'vendor.ID_VENDOR=transaksi.ID_VENDOR', 'left')
            ->join('satuan', 'satuan.ID_SATUAN=barang.ID_SATUAN', 'left')
            ->where($condition)
            ->groupBy('transaksi.ID_TRANSAKSI')
            ->get()->getResultArray();
    }

    public function getTransaksiKeluarByDate($date){
        $date = new \DateTime($date);
        $condition = ['transaksi.DATE_OUT' => $date->format('Y-m-d'), 'DELETED_T ='=>null];
        return $this->db->table('transaksi')
            ->join('barang','barang.ID_BARANG=transaksi.ID_BARANG', 'left')
            ->join('lokasi', 'lokasi.ID_LOKASI=barang.ID_LOKASI', 'left')
            ->join('vendor', 'vendor.ID_VENDOR=transaksi.ID_VENDOR', 'left')
            ->join('satuan', 'satuan.ID_SATUAN=barang.ID_SATUAN', 'left')
            ->where($condition)
            ->groupBy('transaksi.ID_TRANSAKSI')
            ->get()->getResultArray();
    }

    public function getTransaksiMasukRangeDate($datestart, $dateend){
        $datestart = new \DateTime($datestart);
        $datestart = $datestart->format('Y-m-d');
        $dateend = new \DateTime($dateend);
        $dateend = $dateend->format('Y-m-d');
        $condition = ['DELETED_T = ' => null];
        return $this->db->table('transaksi')
            ->join('barang','barang.ID_BARANG=transaksi.ID_BARANG', 'left')
            ->join('lokasi', 'lokasi.ID_LOKASI=barang.ID_LOKASI', 'left')
            ->join('vendor', 'vendor.ID_VENDOR=transaksi.ID_VENDOR', 'left')
            ->join('satuan', 'satuan.ID_SATUAN=barang.ID_SATUAN', 'left')
            ->where($condition)
            ->where("transaksi.DATE_IN BETWEEN '$datestart' and '$dateend'")
            ->groupBy('transaksi.ID_TRANSAKSI')
            ->get()->getResultArray();
    }

    public function getTransaksiKeluarRangeDate($datestart, $dateend){
        $datestart = new \DateTime($datestart);
        $datestart = $datestart->format('Y-m-d');
        $dateend = new \DateTime($dateend);
        $dateend = $dateend->format('Y-m-d');
        $condition = ['DELETED_T = ' => null];
        return $this->db->table('transaksi')
            ->join('barang','barang.ID_BARANG=transaksi.ID_BARANG', 'left')
            ->join('lokasi', 'lokasi.ID_LOKASI=barang.ID_LOKASI', 'left')
            ->join('vendor', 'vendor.ID_VENDOR=transaksi.ID_VENDOR', 'left')
            ->join('satuan', 'satuan.ID_SATUAN=barang.ID_SATUAN', 'left')
            ->where($condition)
            ->where("transaksi.DATE_OUT BETWEEN '$datestart' and '$dateend'")
            ->groupBy('transaksi.ID_TRANSAKSI')
            ->get()->getResultArray();
    }
}