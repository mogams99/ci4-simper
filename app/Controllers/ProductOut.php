<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class ProductOut extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Barang Keluar - Operator',
            'transac' => $this->TransaksiModel->getTransaksiKeluar()
        ];
        return view('operator/out-product/master', $data);
    }

    public function add($id = NULL) 
    {
        $date_out = date("d-m-Y");
        $id_pengguna = $_SESSION["ID_USER"];

        if($id == NULL){
            $transac['ID_TRANSAKSI'] = $this->TransaksiModel->getKodeTransaksiKeluar();
            $data = [
                'title' => 'Tambah Barang Keluar - Operator',
                'action' => site_url('inputbrgkeluar'),
                'transac' => $transac,
                'product' => $this->ProdukModel->findAll(),
                'category' => $this->KategoriModel->findAll(),
                'unit' => $this->SatuanModel->findAll(),
                'location' => $this->LokasiModel->findAll(),
                'vendor' => $this->VendorModel->findAll(),
                'formHeader' => 'Tambah Barang Keluar',
                'tanggal_keluar' => $date_out,
                'user_aktif' => $id_pengguna
            ];
        }else{
            $data = [
                'title' => 'Edit Barang Masuk - Operator',
                'action' => base_url('updatebrgkeluar'),
                'transac' => $this->TransaksiModel->getDetailTransaksi("keluar", $id),
                'product' => $this->ProdukModel->findAll(),
                'category' => $this->KategoriModel->findAll(),
                'unit' => $this->SatuanModel->findAll(),
                'vendor' => $this->VendorModel->findAll(),
                'location' => $this->LokasiModel->findAll(),
                'formHeader' => 'Edit Barang Keluar',
                'user_aktif' => $id_pengguna
            ];
        }

        return view('operator/out-product/add_edit', $data);
    }

    public function inputBarangKeluar(){
        if (!$this->validate([
            'ID_TRANSAKSI' => 'required',
            'ID_BARANG' => 'required',
            'STOK_KELUAR' => 'required|alpha_numeric|is_natural_no_zero',
            'DATE_OUT' => 'required',
            'KETERANGAN_TRANSAKSI' => 'required|alpha_space'
        ])) {
            //error data ada yang kosong
            $validation =  \Config\Services::validation();
            return 'alertaBarangKeluar';
        }
        $jumlah_stok = (int)$this->request->getVar('STOK_KELUAR');
        $harga = preg_replace("/[^0-9]/", '', $this->request->getVar('HARGA'));
        $total_harga = (int)$harga*$jumlah_stok;
        $dateout = date('Y-m-d', strtotime($this->request->getVar('DATE_OUT')));
       if($this->ProdukModel->isOutOfStock($this->request->getVar('ID_BARANG'), $jumlah_stok)){
           return 'errorBarangKeluar';
       } else {
           $data = [
               'ID_TRANSAKSI' => $this->request->getVar('ID_TRANSAKSI'),
               'ID_USER' => $this->request->getVar('ID_USER'),
               'ID_BARANG' => $this->request->getVar('ID_BARANG'),
               'JUMLAH_BARANG' => $this->request->getVar('STOK_KELUAR'),
               'DATE_OUT' => $dateout,
               'TOTAL_HARGA' => $total_harga,
               'KETERANGAN_TRANSAKSI' => $this->request->getVar('KETERANGAN_TRANSAKSI')
           ];
           if ($this->TransaksiModel->save($data) == false) {
               return 'errorBarangKeluar';
           } else {
               $this->ProdukModel->decrementStok($this->request->getVar('ID_BARANG'), $jumlah_stok);
               $logdata = [
                   'id_user' => $this->request->getVar('ID_USER'),
                   'id_transaksi' => $this->request->getVar('ID_TRANSAKSI'),
                   'keterangan_log' => 'Insert Transaksi Barang Keluar'
               ];
               $this->logModel->insert($logdata);
           }
       }
           return 'tambahBarangKeluar';
    }

    public function updateBarangKeluar(){
        if (!$this->validate([
            // 'ID_TRANSAKSI' => 'required',
            // 'ID_BARANG' => 'required',
            // 'DATE_OUT' => 'required',
            // 'STOK_KELUAR' => 'required|alpha_numeric|is_natural_no_zero',
            'KETERANGAN_TRANSAKSI' => 'required|alpha_space'
        ])) {
            //error data ada yang kosong
            $validation =  \Config\Services::validation();
            return 'alertaBarangKeluar';
        }
        $id = $this->request->getVar('ID_TRANSAKSI');
        // $time = $this->request->getVar('DATE_IN');
        // $jumlah_stok = (int)$this->request->getVar('STOK_KELUAR');
        // $total_harga = (int)$this->request->getVar('HARGA')*$jumlah_stok;
        $data = [
            'ID_USER' => $this->request->getVar('ID_USER'),
            // 'ID_BARANG' => $this->request->getVar('ID_BARANG'),
            // 'JUMLAH_BARANG' => $this->request->getVar('STOK_KELUAR'),
            // 'DATE_IN' => $time,
            // 'TOTAL_HARGA' => $total_harga,
            'KETERANGAN_TRANSAKSI' => $this->request->getVar('KETERANGAN_TRANSAKSI')
        ];
        $updated = $this->TransaksiModel->update($id, $data);
        if ($updated){
            $logdata = [
                'id_user' => $this->request->getVar('ID_USER'),
                'id_transaksi' => $this->request->getVar('ID_TRANSAKSI'),
                'keterangan_log' => 'Update Transaksi Barang Keluar'
            ];
            $this->logModel->insert($logdata);
            return 'editBarangKeluar';
        } else {
            return 'errorBarangKeluar';
        }
    }

    public function delete($id){
        $this->TransaksiModel->delete($id);
        $logdata = [
            'id_user' => $_SESSION["ID_USER"],
            'id_transaksi' => $id,
            'keterangan_log' => 'Delete Transaksi Barang Keluar'
        ];
        $this->logModel->insert($logdata);
        return redirect()->to('/brgkeluar_op');
    }
}
