<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class ProductIn extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Barang Masuk - Operator',
            'transac' => $this->TransaksiModel->getTransaksiMasuk()
        ];
        
        return view('operator/in-product/master', $data);
    }

    public function add($id = NULL) // $id_kategori=null (Opsi selected combobox)
    {
        $date_in = date("d-m-Y");
        $id_pengguna = $_SESSION["ID_USER"];

        if($id == NULL){
            $transac['ID_TRANSAKSI'] = $this->TransaksiModel->getKodeTransaksiMasuk();
            $data = [
                'title' => 'Tambah Barang Masuk - Operator',
                'action' => site_url('/inputbrgmasuk'),
                'transac' => $transac,
                'product' => $this->ProdukModel->findAll(),
                'category' => $this->KategoriModel->findAll(),
                'unit' => $this->SatuanModel->findAll(),
                'location' => $this->LokasiModel->findAll(),
                'vendor' => $this->VendorModel->findAll(),
                'formHeader' => 'Tambah Barang Masuk',
                'tanggal_masuk' => $date_in,
                'user_aktif' => $id_pengguna
            ];
        }else{
            $data = [
                'title' => 'Edit Barang Masuk - Operator',
                'action' => base_url('updatebrgmasuk'),
                'transac' => $this->TransaksiModel->getDetailTransaksi("masuk", $id),
                'product' => $this->ProdukModel->findAll(),
                'category' => $this->KategoriModel->findAll(),
                'unit' => $this->SatuanModel->findAll(),
                'vendor' => $this->VendorModel->findAll(),
                'location' => $this->LokasiModel->findAll(),
                'formHeader' => 'Edit Barang Masuk',
                'user_aktif' => $id_pengguna
            ];
        }

        return view('operator/in-product/add_edit', $data);
    }

    public function generateKodeTrxMasuk(){
        $kodeTrx = $this->TransaksiModel->getKodeTransaksiMasuk();
        echo json_encode($kodeTrx);
        return true;
    }

    public function getProdukDetail($id_brg){
        $detailProduk = $this->ProdukModel->getProdukDetail($id_brg);
        echo json_encode($detailProduk[0]);
        return true;
    }

    public function inputBarangMasuk()
    {  
        if (!$this->validate([
            'ID_TRANSAKSI' => 'required',
            'ID_BARANG' => 'required',
            'VENDOR' => 'required',
            'STOK_MASUK' => 'required|alpha_numeric|is_natural_no_zero',
            'DATE_IN' => 'required',
        ])) {
            // Cek validasi jika ada kolom yang tidak di isi
            $validation =  \Config\Services::validation();
            return 'alertaBarangMasuk';
        }
        $jumlah_stok = (int)$this->request->getVar('STOK_MASUK');
        $harga = preg_replace("/[^0-9]/", '', $this->request->getVar('HARGA'));
        $total_harga = (int)$harga*$jumlah_stok;
        $datein = date('Y-m-d', strtotime($this->request->getVar('DATE_IN')));
        $data = [
            'ID_TRANSAKSI' => $this->request->getVar('ID_TRANSAKSI'),
            'ID_USER' => $this->request->getVar('ID_USER'),
            'ID_BARANG' => $this->request->getVar('ID_BARANG'),
            'ID_VENDOR' => $this->request->getVar('VENDOR'),
            'JUMLAH_BARANG' => $this->request->getVar('STOK_MASUK'),
            'DATE_IN' => $datein,
            'TOTAL_HARGA' => $total_harga,
        ];

        if ($this->TransaksiModel->save($data) == false) {
            // Pengecekan jika ada kegagalan input data kedalam tabel
            return 'errorBarangMasuk';
        } else {
            // Jika input berhasil maka akan menjalankan method pada model produk
            $this->ProdukModel->incrementStok($this->request->getVar('ID_BARANG'),$jumlah_stok );
            $logdata = [
                'id_user' => $this->request->getVar('ID_USER'),
                'id_transaksi' => $this->request->getVar('ID_TRANSAKSI'),
                'keterangan_log' => 'Insert Barang Masuk'
            ];
            $this->logModel->insert($logdata);
        }
        return "tambahBarangMasuk";
    }

    public function updateBarangMasuk()
    {
        if (!$this->validate([
            'VENDOR' => 'required',
            // 'STOK_MASUK' => 'required|alpha_numeric|is_natural_no_zero',
        ])) {
            // Validasi jika ada kolom input yang kosong
            $validation =  \Config\Services::validation();
            return 'alertaBarang';
        }
        $id = $this->request->getVar('ID_TRANSAKSI');
        // $time = $this->request->getVar('DATE_IN');
        // $jumlah_stok = (int)$this->request->getVar('STOK_MASUK');
        // $total_harga = (int)$this->request->getVar('HARGA')*$jumlah_stok;
        $data = [
            // 'ID_BARANG' => $this->request->getVar('ID_BARANG'),
            'ID_USER' => $this->request->getVar('ID_USER'),
            'ID_VENDOR' => $this->request->getVar('VENDOR'),
            // 'JUMLAH_BARANG' => $this->request->getVar('STOK_MASUK')
            // 'DATE_IN' => $time,
            // 'TOTAL_HARGA' => $total_harga
        ];
        $updated = $this->TransaksiModel->update($id, $data);
        if ($updated){
            // Jika input data ke tabel berhasil
            $logdata = [
                'id_user' => $this->request->getVar('ID_USER'),
                'id_transaksi' => $this->request->getVar('ID_TRANSAKSI'),
                'keterangan_log' => 'Update Transaksi Barang Masuk'
            ];
            $this->logModel->insert($logdata);
            return 'editBarangMasuk';
        } else {
            // Jika input data ke tabel gagal
            return 'errorBarangMasuk';
        }
    }

    public function delete($id){
        $this->TransaksiModel->delete($id);
        $logdata = [
            'id_user' => $_SESSION["ID_USER"],
            'id_transaksi' => $id,
            'keterangan_log' => 'Delete Transaksi Barang Masuk'
        ];
        $this->logModel->insert($logdata);
        return redirect()->to('/brgmasuk_op');
    }
}
