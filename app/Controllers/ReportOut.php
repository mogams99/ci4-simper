<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class ReportOut extends BaseController
{
    public function index($datestart = null, $dateend = null)
    {
        $date_report =  date("d-m-Y");
        $databrgkeluar = null;
        // Set data view
        $data = [
            'title' => 'Laporan Barang Keluar - Supervisor',
            'tanggal' => $date_report,
            'date_start' => null,
            'date_end' => null,
            'date_harian' => null
        ];
        // Cek tipe report
        if ($datestart==null && $dateend==null) {
            $data['date_harian'] = $date_report;
            $data['data'] = $this->getTransaksiKeluarByDate($date_report);
        } else {
            $data['date_start'] = $datestart;
            $data['date_end'] = $dateend;
            $data['data'] = $this->getTransaksiKeluarRangeDate($datestart,$dateend);
        }
        return view('supervisor/out-product/main', $data);
    }

    public function getTransaksiKeluarByDate($date){
        $transaksikeluar = $this->TransaksiModel->getTransaksiKeluarByDate($date);
        return $transaksikeluar;
    }
    public function getTransaksiKeluarRangeDate($datestart, $dateend){
        $transaksikeluar = $this->TransaksiModel->getTransaksiKeluarRangeDate($datestart, $dateend);
        return $transaksikeluar;
    }
}
