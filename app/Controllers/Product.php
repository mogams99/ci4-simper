<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use mysql_xdevapi\Exception;

class Product extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Barang - Operator',
            'product' => $this->ProdukModel->getProduk()
        ];

        return view('operator/product/master', $data);
    }

    public function add($id = NULL)
    {
        if($id == NULL){
            $data = [
                'title' => 'Tambah Barang - Operator',
                'category' => $this->KategoriModel->findAll(),
                'unit' => $this->SatuanModel->findAll(),
                'location' => $this->LokasiModel->findAll(),
                'action' => base_url('product/process_add'),
                'formHeader' => 'Tambah Barang'
            ];
        }else{
            $data = [
                'title' => 'Edit Barang - Operator',
                'product' => $this->ProdukModel->getProdukDetail($id)[0],
                // 'category' => $this->KategoriModel->findAll(),
                'unit' => $this->SatuanModel->findAll(),
                'location' => $this->LokasiModel->findAll(),
                'action' => base_url('product/process_edit'),
                'formHeader' => 'Edit Barang'
            ];
        }

        return view('operator/product/add_edit', $data);
    }

    // public function delete($id = NULL)
    // {
    //     if($id == NULL){
    //         return redirect()->to('/brgmaster_op');
    //     }else{
    //         try {
    //             $delete = $this->ProdukModel->delete($id);
    //         } catch (\mysqli_sql_exception $e){
    //             return redirect()->to('/brgmaster_op');
    //         }
    //         return redirect()->to('/brgmaster_op');
    //     }
    // }

    public function process_add()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'ID_BARANG' => 'required',
            'NAMA_BARANG' => 'required',
            'MINIMAL_BARANG' => 'required|alpha_numeric|is_natural_no_zero',
            'BLOK' => 'required',
            'NOTASI' => 'required',  
            'HARGA_BARANG' => 'required',
            'KETERANGAN_BARANG' => 'required|alpha_space'
        ]);
        $dataValid = $validation->withRequest($this->request)->run();
        if($dataValid){
            if (!empty($_POST)){
                $hargabarang = preg_replace("/[^0-9]/", '', $this->request->getVar('HARGA_BARANG'));
                $add = $this->ProdukModel->insert([
                    'ID_BARANG'     => $this->request->getVar('ID_BARANG'),
                    'ID_SATUAN'     => $this->request->getVar('NOTASI'),
                    'ID_LOKASI'     => $this->request->getVar('BLOK'),
                    'ID_KATEGORI'   => $this->request->getVar('PREFIX_KATEGORI'),
                    'NAMA_BARANG'   => $this->request->getVar('NAMA_BARANG'),
                    'MINIMAL_BARANG'   => $this->request->getVar('MINIMAL_BARANG'),
                    'KETERANGAN_BARANG' => $this->request->getVar('KETERANGAN_BARANG'),
                    'HARGA_BARANG'  =>  (int)$hargabarang,
                ]);

                return 'tambahBarang';
            }else{
                return 'errorBarang';
            }
        } else {
            return 'alertaBarang';
        }
    }

    public function process_edit()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'NAMA_BARANG' => 'required',
            'MINIMAL_BARANG' => 'required|alpha_numeric|is_natural_no_zero',
            'BLOK' => 'required',
            'NOTASI' => 'required',  
            'HARGA_BARANG' => 'required',
            'KETERANGAN_BARANG' => 'required|alpha_space'
        ]);
        $dataValid = $validation->withRequest($this->request)->run();
        if ($dataValid) {
            if (!empty($_POST)){
                $hargabarang = preg_replace("/[^0-9]/", '', $this->request->getVar('HARGA_BARANG'));
                $add = $this->ProdukModel->save([
                    'ID_BARANG'     => $this->request->getVar('ID_BARANG'),
                    'ID_SATUAN'     => $this->request->getVar('NOTASI'),
                    'ID_LOKASI'     => $this->request->getVar('BLOK'),
                    'ID_KATEGORI'   => $this->request->getVar('PREFIX_KATEGORI'),
                    'NAMA_BARANG'   => $this->request->getVar('NAMA_BARANG'),
                    'MINIMAL_BARANG'   => $this->request->getVar('MINIMAL_BARANG'),
                    'KETERANGAN_BARANG' => $this->request->getVar('KETERANGAN_BARANG'),
                    'HARGA_BARANG'  => (int)$hargabarang,
                ]);
    
                return 'editBarang';
            }else{
                return 'errorBarang';
            }
        } else {
            return 'alertaBarang';
        }
    }

    public function generateKodeProduk($id_kategori): bool
    {
        $kodebrg = $this->ProdukModel->getKodeProduk($id_kategori);
        echo json_encode($kodebrg);
        return true;
    }

    public function getProdukDetail($id_brg){
        $detailProduk = $this->ProdukModel->getProdukDetail($id_brg);
        echo json_encode($detailProduk[0]);
        return true;
    }

    public function getAllProdukDetail(){
        $produk = $this->ProdukModel->getProduk();
        echo json_encode($produk);
        return true;
    }
}
