<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Location extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Lokasi - Operator',
            'location' => $this->LokasiModel->findAll()
        ];

        return view('operator/location/master', $data);
    }

    public function add($id = NULL)
    {
        if($id == NULL){
            $data = [
                'title' => 'Tambah Lokasi - Operator',
                'action' => base_url('location/process_add'),
                'formHeader' => 'Tambah Lokasi'
            ];
        }else{
            $data = [
                'title' => 'Edit Lokasi - Operator',
                'location' => $this->LokasiModel->find($id),
                'action' => base_url('location/process_edit'),
                'formHeader' => 'Edit Lokasi'
            ];
        }
        
        return view('operator/location/add_edit', $data);
    }

    public function delete($id = NULL)
    {
        if($id == NULL){
            return redirect()->to('/lokasi_op');
        }else{
            $delete = $this->LokasiModel->delete($id);

            return redirect()->to('/lokasi_op');
        }
    }

    public function process_add()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'BLOK' => 'required' , 
            'KETERANGAN_LOKASI' => 'required'
        ]);
        $dataValid = $validation->withRequest($this->request)->run();
        
        if($dataValid){
            if (!empty($_POST)){
                $add = $this->LokasiModel->insert($_POST);

                if($add){
                    return 'tambahLokasi';
                }
            }
        }else{
            return 'alertaLokasi';
        }
    }
    
    public function process_edit()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'BLOK' => 'required' , 
            'KETERANGAN_LOKASI' => 'required'
        ]);
        $dataValid = $validation->withRequest($this->request)->run();

        if ($dataValid){
            if (!empty($_POST)){
                $edit = $this->LokasiModel->save($_POST);
    
                if($edit){
                    return 'editLokasi';
                }
            }
        } else {
            return 'alertaLokasi';
        }
    }
}
