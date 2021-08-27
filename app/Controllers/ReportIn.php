<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class ReportIn extends BaseController
{
    public function index($datestart = null,$dateend = null)
    {
        $date_report =  date("d-m-Y");
        $databrgkeluar = null;
        // Set data view
        $data = [
            'title' => 'Laporan Barang Masuk - Supervisor',
            'tanggal' => $date_report,
            'date_start' => null,
            'date_end' => null,
            'date_harian' => null
        ];
        // Cek tipe report
        if ($datestart==null && $dateend==null) {
            $data['date_harian'] = $date_report;
            $data['data'] = $this->getTransaksiMasukByDate($date_report);
        } else {
            $data['date_start'] = $datestart;
            $data['date_end'] = $dateend;
            $data['data'] = $this->getTransaksiMasukRangeDate($datestart,$dateend);
        }
        
        return view('supervisor/in-product/main', $data);
    }

    public function getTransaksiMasukByDate($date){
        $transaksimasuk = $this->TransaksiModel->getTransaksiMasukByDate($date);
        return $transaksimasuk;
    }

    public function getTransaksiMasukRangeDate($datestart, $dateend){
        $transaksimasuk = $this->TransaksiModel->getTransaksiMasukRangeDate($datestart, $dateend);
        return $transaksimasuk;
    }

}
