<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User_model;

class Auth extends BaseController
{
    public function index()
    {
        helper(['form']);

        $data = [
            'title' => 'Login - SIMPER',
            'action' => base_url('proses_masuk')
        ];
        
        echo view('auth/login', $data);
    }

    public function register()
    {
        helper(['form']);

        $data = [
            'title' => 'Daftar - SIMPER',
            'action' => base_url('proses_regis')
        ];

        echo view('auth/register', $data);
    }

    public function process_regist()
    {   
        if (!$this->validate([
            'NAMA' => [
                'rules' => 'required|min_length[4]|max_length[30]|is_unique[pengguna.NAMA]',
                'errors' => [
                    'required' => 'Nama Lengkap Harus Diisi',
                    'min_length' => 'Nama Lengkap Minimal Harus Berjumlah 4 Karakter',
                    'max_length' => 'Nama Lengkap Maksimal Berjumlah 15 Karakter',
                    'is_unique' => 'Nama Lengkap sudah ada sebelumnya'
                ]
            ],
            'PHONE' => [
                'rules' => 'required|min_length[12]|max_length[13]|is_natural_no_zero|is_unique[pengguna.PHONE]',
                'errors' => [
                    'required' => 'No. Handphone Harus Diisi',
                    'min_length' => 'No. Handphone Minimal Harus Berjumlah 12 Karakter',
                    'max_length' => 'No. Handphone Maskimal Berjumlah 13 Karakter',
                    'is_unique' => 'No. Handphone sudah terpakai'
                ]
            ],
            'EMAIL' => [
                'rules' => 'required|is_unique[pengguna.PHONE]',
                'errors' => [
                    'required' => 'Email Harus Diisi',
                    'is_unique' => 'Email sudah terpakai'
                ]
            ],
            'USERNAME' => [
                'rules' => 'required|min_length[4]|max_length[8]|alpha_numeric|is_unique[pengguna.USERNAME]',
                'errors' => [
                    'required' => 'Username Harus Diisi',
                    'min_length' => 'Username Minimal Harus Berjumlah 4 Karakter',
                    'max_length' => 'Username Maksimal Berjumlah 8 Karakter',
                    'alpha_numeric' => 'Username Tidak Boleh Menggunakan Spasi',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
            'JABATAN' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jobdesk Harus Dipilih',
                ]
            ],
            'PASSWORD' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => 'Password Harus Diisi',
                    'min_length' => 'Password Minimal Harus Bejumlah 4 Karakter',
                    'max_length' => 'Password Maksimal Harus Berjumlah 50 Karakter',
                ]
            ],
            'PASSWORD_CONF' => [
                'rules' => 'matches[PASSWORD]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $add = $this->PenggunaModel->insert([
            'NAMA'  => $this->request->getVar('NAMA'),
            'JABATAN'   => $this->request->getVar('JABATAN'),
            'PHONE'   => $this->request->getVar('PHONE'),
            'EMAIL'  => $this->request->getVar('EMAIL'),
            'USERNAME'  => $this->request->getVar('USERNAME'),
            'PASSWORD'  => password_hash($this->request->getVar('PASSWORD'), PASSWORD_BCRYPT),
        ]);

        if($add){
            session()->setFlashdata('MsgReg', 'Akun anda berhasil mendaftar!');
            return redirect()->to('/masuk');
        }
    }

    public function process_login()
    {   
        $session    = session();
        $username   = $this->request->getVar('USERNAME');
        $password   = $this->request->getVar('PASSWORD');
        $data       = $this->PenggunaModel->where('USERNAME', $username)->first();

        if ($data) {
            $pass = $data['PASSWORD'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $sessAktif = [
                    'ID_USER'		=> $data['ID_USER'],
                    'NAMA'		    => $data['NAMA'],
                    'JABATAN'		=> $data['JABATAN'],
                    'USERNAME'		=> $data['USERNAME'],
                    'PASSWORD'		=> $data['PASSWORD'],
                    'logged_in'     => TRUE
                ];

                $session->set($sessAktif);

                if ($data['JABATAN'] == 0) {
                    return redirect()->to('/beranda_spv');
                } elseif ($data['JABATAN'] == 1) {
                    return redirect()->to('/beranda_op');
                } else {
                    return redirect()->to('/keluar');
                }
            } else {
                $session->setFlashdata('Msg', 'Username atau Password anda salah!');
                return redirect()->to('/masuk');
            }
        } else {
            $session->setFlashdata('Msg', 'Username atau Password harus diisi!');
            return redirect()->to('/masuk');
        }

    }

    public function logout()
	{
        session()->destroy();
        
        return redirect()->to('masuk');
	}
}
