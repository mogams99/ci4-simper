<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ReportStock extends BaseController
{
    public function index($idbarang = null)
    {
        $databarang = $this->ProdukModel->getProduk();
        $selecteddatabarang = null;
        $selectednamabarang = null;
        if ($idbarang == null) {
            $idbarang = "all";
            $selecteddatabarang = $databarang;
        } else {
            $selecteddatabarang = $this->ProdukModel->getProdukDetail($idbarang);
            $selectednamabarang = $selecteddatabarang[0]['NAMA_BARANG'];
        }
        $data = [
            'title' => 'Laporan Sisa Stok - Supervisor',
            'product' => $databarang,
            'selected_barang' => $idbarang,
            'selected_data_barang' => $selecteddatabarang,
            'selected_nama_barang' => $selectednamabarang
        ];


        return view('supervisor/stock-product/main', $data);
    }
}


