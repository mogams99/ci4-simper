<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Vendor extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Master Vendor - Operator',
            'vendor' => $this->VendorModel->findAll()
        ];

        return view('operator/supplier/master', $data);
    }

    public function add($id = NULL)
    {
        if($id == NULL){
            $data = [
                'title' => 'Tambah Vendor - Operator',
                'action' => base_url('vendor/process_add'),
                'formHeader' => 'Tambah Vendor'
            ];
        }else{
            $data = [
                'title' => 'Edit Vendor - Operator',
                'vendor' => $this->VendorModel->find($id),
                'action' => base_url('vendor/process_edit'),
                'formHeader' => 'Edit Vendor'
            ];
        }
        
        return view('operator/supplier/add_edit', $data);
    }

    public function delete($id = NULL)
    {
        if($id == NULL){
            return redirect()->to('/vendor_op');
        }else{
            $delete = $this->VendorModel->delete($id);

            return redirect()->to('/vendor_op');
        }
    }

    public function process_add()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'NAMA_VENDOR' => 'required' 
        ]);
        $dataValid = $validation->withRequest($this->request)->run();
        
        if($dataValid){
            if (!empty($_POST)){
                $add = $this->VendorModel->insert($_POST);

                if($add){
                    return 'tambahVendor';
                }
            }
        }else{
            return 'alertaVendor';
        }
    }

    public function process_edit()
    {
        if (!empty($_POST)){
            $edit = $this->VendorModel->save($_POST);

            if($edit){
                return 'editVendor';
            }
        }
    }

}
