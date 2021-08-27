<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Operator extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Beranda - Operator',
            'total_barang_masuk' => $this->TransaksiModel->getTotalBarangMasuk(),
            'total_barang_keluar' => $this->TransaksiModel->getTotalBarangKeluar(),
            'jumlah_stok_tersedia' => $this->ProdukModel->getTotalStok(),
            'jumlah_kategori' => $this->KategoriModel->getTotalKategori(),
            'jumlah_lokasi' => $this->LokasiModel->getTotalLokasi(),
            'jumlah_satuan' => $this->SatuanModel->getTotalSatuan(),
            'jumlah_vendor' => $this->VendorModel->getTotalVendor()
        ];

        return view('operator/dashboard', $data);
    }

    public function editProfile()
    {
        $grab_session = $_SESSION["ID_USER"];
    
        $data = [
            'title' => 'Ubah Profil - Operator',
            'pengguna' => $this->PenggunaModel->find($grab_session),
            'action' => '/update_op',
            'formHeader' => 'Ubah Profil Operator'
        ];

        return view('operator/edit_profile', $data);
    }

    public function updateProfile()
    {   
        $id_user = $_POST['ID_USER'];

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
                'ID_USER' => $this->request->getVar('ID_USER'),
                'NAMA' => $this->request->getVar('NAMA'),
                'PHONE' => $this->request->getVar('PHONE'),
                'EMAIL' => $this->request->getVar('EMAIL'),
                'USERNAME' => $this->request->getVar('USERNAME'),
                'PASSWORD' => password_hash($this->request->getVar('PASSWORD'), PASSWORD_DEFAULT)
            ]);
        } else {
            $updatestate =  $this->PenggunaModel->save([
                'ID_USER' => $this->request->getVar('ID_USER'),
                'NAMA' => $this->request->getVar('NAMA'),
                'PHONE' => $this->request->getVar('PHONE'),
                'EMAIL' => $this->request->getVar('EMAIL'),
                'USERNAME' => $this->request->getVar('USERNAME')
            ]);
        }

        if($updatestate){
            session()->set('NAMA', $this->request->getVar('NAMA'));
            session()->setFlashdata('Msg', 'Anda berhasil merubah profil operator!');
            return redirect()->to('/beranda_op');
        }
    }
    // {
    //     $updatestate = false;
    //     if ($this->request->getVar('PASSWORD')!=""){
    //         $updatestate =  $this->PenggunaModel->save([
    //             'ID_USER' => $this->request->getVar('ID_USER'),
    //             'NAMA' => $this->request->getVar('NAMA'),
    //             'PHONE' => $this->request->getVar('PHONE'),
    //             'EMAIL' => $this->request->getVar('EMAIL'),
    //             'USERNAME' => $this->request->getVar('USERNAME'),
    //             'PASSWORD' => password_hash($this->request->getVar('PASSWORD'), PASSWORD_DEFAULT)
    //         ]);
    //     } else {
    //         $updatestate =  $this->PenggunaModel->save([
    //             'ID_USER' => $this->request->getVar('ID_USER'),
    //             'NAMA' => $this->request->getVar('NAMA'),
    //             'PHONE' => $this->request->getVar('PHONE'),
    //             'EMAIL' => $this->request->getVar('EMAIL'),
    //             'USERNAME' => $this->request->getVar('USERNAME')
    //         ]);
    //     }
    //     if ($updatestate){
    //         session()->set('NAMA', $this->request->getVar('NAMA'));
    //         return "editProfilOperator";
    //     } else {
    //         return redirect()->to('/ubahprofil_op')->withInput();
    //     }
    // }
}
