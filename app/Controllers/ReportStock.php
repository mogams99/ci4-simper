<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ReportStock extends BaseController
{
    public function index($idbarang = null)
    {
        $databarang = null;
        if ($idbarang == null) {
            $databarang =  $this->ProdukModel->getProduk();
            $idbarang = "all";
        } else {
            $databarang = $this->ProdukModel->getProdukDetail($idbarang);
        }
        $data = [
            'title' => 'Laporan Sisa Stok - Supervisor',
            'product' => $databarang,
            'selected_barang' => $idbarang
        ];

        return view('supervisor/stock-product/main', $data);
    }
}


