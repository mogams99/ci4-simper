<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Category extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Kategori - Operator',
            'category' => $this->KategoriModel->findAll()
        ];

        return view('operator/category/master', $data);
    }

    public function add($id = NULL)
    {
        if($id == NULL){
            $data = [
                'title' => 'Tambah Kategori - Operator',
                'action' => base_url('category/process_add'),
                'formHeader' => 'Tambah Kategori'
            ];
        }else{
            $data = [
                'title' => 'Edit Kategori - Operator',
                'category' => $this->KategoriModel->find($id),
                'action' => base_url('category/process_edit'),
                'formHeader' => 'Edit Kategori'
            ];
        }
        
        return view('operator/category/add_edit', $data);
    }

    // public function delete($id = NULL)
    // {
    //     if($id == NULL){
    //         return redirect()->to('/kategori_op');
    //     }else{
    //         $delete = $this->KategoriModel->delete($id);

    //         return redirect()->to('/kategori_op');
    //     }
    // }

    public function process_add()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'NAMA_KATEGORI' => 'required' , 
            'PREFIX_KATEGORI' => 'required'
        ]);
        $dataValid = $validation->withRequest($this->request)->run();
        
        if($dataValid){
            if (!empty($_POST)){
                $add = $this->KategoriModel->insert($_POST);

                if($add){
                    return 'tambahKategori';
                }
            }
        }else{
            return 'alertaKategori';
        }
    }
    
    public function process_edit()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'NAMA_KATEGORI' => 'required' , 
            'PREFIX_KATEGORI' => 'required'
        ]);
        $dataValid = $validation->withRequest($this->request)->run();
        
        if ($dataValid){
            if (!empty($_POST)){
                $edit = $this->KategoriModel->save($_POST);
    
                if($edit){
                    return 'editKategori';
                }
            }
        } else {
            return 'alertaKategori';
        }
    }
    
}
