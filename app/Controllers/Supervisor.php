<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Supervisor extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Beranda - Supervisor',
            'totalhargastok' => $this->ProdukModel->getHargaTotalSisaStok(),
            'totalhargabrgmasuk' => $this->TransaksiModel->getTotalHargaBrgMasuk(),
            'totalhargabrgkeluar' => $this->TransaksiModel->getTotalHargaBrgKeluar()
        ];

        return view('supervisor/dashboard', $data);
    }

    public function logHistory()
    {
        $data = [
            'title' => 'Riwayat Aksi - Supervisor',
            'datalog' => $this->logModel->getAllLog()
        ];

        return view('supervisor/history', $data);
    }

    public function getChartTransaksiMasuk()
    {
        if(!empty($this->request->getVar('TAHUN'))){
            $tahun = $this->request->getVar('TAHUN');
            $data = [
                'title' => 'Grafik Barang Masuk - Supervisor',
                'formHeader' => 'Tahun',
                'tahun' => $tahun,
                'params' => $this->TransaksiModel->getTahun(),
            ];
            $result1 = $this->TransaksiModel->getChartTransaksiMasuk($tahun);
        }else{
            $tahun = date('Y');
            $data = [
                'title' => 'Grafik Barang Masuk - Supervisor',
                'formHeader' => 'Tahun',
                'tahun' => $tahun,
                'params' => $this->TransaksiModel->getTahun(),
            ];
            $result1 = $this->TransaksiModel->getChartTransaksiMasuk($tahun);
        };

        foreach($result1 as $chart) {
            $data['label'][] = $chart['nama_bulan'];
            $data['data'][] = (int) $chart['harga_total'];
        }

        $data['chart_in'] = json_encode($data);

        return view('supervisor/chart-bar/in-product', $data);
    }

    public function getChartTransaksiKeluar()
    {
        $check = !empty($this->request->getVar('TAHUN'));
        if($check == true){
            $tahun = $this->request->getVar('TAHUN');
            $data = [
                'title' => 'Grafik Barang Keluar - Supervisor',
                'formHeader' => 'Tahun',
                'tahun' => $tahun,
                'params' => $this->TransaksiModel->getTahun(),
            ];
            $result2 = $this->TransaksiModel->getChartTransaksiKeluar($tahun);
        }else{
            $tahun = date('Y');
            $data = [
                'title' => 'Grafik Barang Keluar - Supervisor',
                'formHeader' => 'Tahun',
                'tahun' => $tahun,
                'params' => $this->TransaksiModel->getTahun(),
            ];
            $result2 = $this->TransaksiModel->getChartTransaksiKeluar($tahun);
        };

        foreach($result2 as $chart) {
            $data['label'][] = $chart['nama_bulan'];
            $data['data'][] = (int) $chart['harga_total'];
        }

        $data['chart_out'] = json_encode($data);

        return view('supervisor/chart-bar/out-product', $data);
    }

    public function editProfile()
    {
        $grab_session = $_SESSION["ID_USER"];

        $data = [
            'title' => 'Ubah Profil - Supervisor',
            'pengguna' => $this->PenggunaModel->find($grab_session),
            'action' => '/update_spv',
            'formHeader' => 'Ubah Profil Supervisor'
        ];

        return view('supervisor/edit_profile', $data);
    }

    public function updateProfile(){
        {   
            $id_user = $_POST['ID_USER2'];

            if (!$this->validate([
                'NAMA' => [
                    'rules' => "required|min_length[4]|max_length[30]|is_unique[pengguna.NAMA,ID_USER,$id_user]",
                    'errors' => [
                        'required' => 'Nama Lengkap Harus Diisi',
                        'min_length' => 'Nama Lengkap Minimal Harus Berjumlah 4 Karakter',
                        'max_length' => 'Nama Lengkap Maksimal Berjumlah 15 Karakter',
                        'is_unique' => 'Nama Lengkap Sudah Terpakai'
                    ]
                ],
                'PHONE' => [
                    'rules' => "required|min_length[12]|max_length[13]|is_natural_no_zero|is_unique[pengguna.PHONE,ID_USER,$id_user]",
                    'errors' => [
                        'required' => 'No. Handphone Harus Diisi',
                        'min_length' => 'No. Handphone Minimal Harus Berjumlah 12 Karakter',
                        'max_length' => 'No. Handphone Maskimal Berjumlah 13 Karakter',
                        'is_unique' => 'No. Handphone Sudah Terpakai'
                    ]
                ],
                'EMAIL' => [
                    'rules' => "required|is_unique[pengguna.PHONE,ID_USER,$id_user]",
                    'errors' => [
                        'required' => 'Email Harus Diisi',
                        'is_unique' => 'Email Sudah Terpakai'
                    ]
                ],
                'USERNAME' => [
                    'rules' => "required|min_length[4]|max_length[8]|alpha_numeric|is_unique[pengguna.USERNAME,ID_USER,$id_user]",
                    'errors' => [
                        'required' => 'Username Harus Diisi',
                        'min_length' => 'Username Minimal Harus Berjumlah 4 Karakter',
                        'max_length' => 'Username Maksimal Berjumlah 8 Karakter',
                        'alpha_numeric' => 'Username Tidak Boleh Menggunakan Spasi',
                        'is_unique' => 'Username Sudah Terpakai'
                    ]
                ],
                'PASSWORD_CONF' => [
                    'rules' => 'matches[PASSWORD]',
                    'errors' => [
                        'matches' => 'Konfirmasi Password Tidak Sesuai Dengan Password Baru',
                    ]
                ],
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }
            $updatestate = false;
            if ($this->request->getVar('PASSWORD')!=""){
                $updatestate =  $this->PenggunaModel->save([
                    'ID_USER' => $this->request->getVar('ID_USER2'),
                    'NAMA' => $this->request->getVar('NAMA'),
                    'PHONE' => $this->request->getVar('PHONE'),
                    'EMAIL' => $this->request->getVar('EMAIL'),
                    'USERNAME' => $this->request->getVar('USERNAME'),
                    'PASSWORD' => password_hash($this->request->getVar('PASSWORD'), PASSWORD_DEFAULT)
                ]);
            } else {
                $updatestate =  $this->PenggunaModel->save([
                    'ID_USER' => $this->request->getVar('ID_USER2'),
                    'NAMA' => $this->request->getVar('NAMA'),
                    'PHONE' => $this->request->getVar('PHONE'),
                    'EMAIL' => $this->request->getVar('EMAIL'),
                    'USERNAME' => $this->request->getVar('USERNAME')
                ]);
            }
    
            if($updatestate){
                session()->set('NAMA', $this->request->getVar('NAMA'));
                session()->setFlashdata('Msg', 'Anda berhasil merubah profil supervisor!');
                return redirect()->to('/beranda_spv');
            }
        }
    }
}
