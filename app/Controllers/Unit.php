<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Unit extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Satuan - Operator',
            'unit' => $this->SatuanModel->findAll()
        ];

        return view('operator/unit/master', $data);
    }

    public function add($id = NULL)
    {
        if($id == NULL){
            $data = [
                'title' => 'Tambah Satuan - Operator',
                'action' => base_url('unit/process_add'),
                'formHeader' => 'Tambah Satuan'
            ];
        }else{
            $data = [
                'title' => 'Edit Satuan - Operator',
                'unit' => $this->SatuanModel->find($id),
                'action' => base_url('unit/process_edit'),
                'formHeader' => 'Edit Satuan'
            ];
        }
        
        return view('operator/unit/add_edit', $data);
    }

    public function delete($id = NULL)
    {
        if($id == NULL){
            return redirect()->to('/satuan_op');
        }else{
            $delete = $this->SatuanModel->delete($id);

            return redirect()->to('/satuan_op');
        }
    }

    public function process_add()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'SATUAN' => 'required' , 
            'NOTASI' => 'required'
        ]);
        $dataValid = $validation->withRequest($this->request)->run();
        
        if($dataValid){
            if (!empty($_POST)){
                $add = $this->SatuanModel->insert($_POST);

                if($add){
                    return 'tambahSatuan';
                }
            }
        }else{
            return 'alertaSatuan';
        }
    }

    public function process_edit()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'SATUAN' => 'required' , 
            'NOTASI' => 'required'
        ]);
        $dataValid = $validation->withRequest($this->request)->run();
        
        if ($dataValid){
            if (!empty($_POST)){
                $edit = $this->SatuanModel->save($_POST);
    
                if($edit){
                    return 'editSatuan';
                }
            }
        } else {
            return 'alertaSatuan';
        }
    }

}
