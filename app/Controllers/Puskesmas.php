<?php

namespace App\Controllers;

use App\Models\PuskesmasModel;

class Puskesmas extends BaseController
{
    protected $puskesmasModel;
    public function __construct()
    {
        $this->puskesmasModel = new PuskesmasModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_puskesmas') ? $this->request->getVar('page_puskesmas') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $puskesmas = $this->puskesmasModel->search($keyword);
        }else{
            $puskesmas = $this->puskesmasModel;
        }

        $data  = [
            'puskesmas' => $puskesmas->paginate(5, 'puskesmas'),
            'pager' => $this->puskesmasModel->pager,
            'currentPage' => $currentPage
        ];
        $data['puskesmas'] = $this->puskesmasModel->getAllData();
        $data['title'] = 'Data Puskesmas';
        // $puskesmasModel = new \App\Models\puskesmasModel();
        // $puskesmasModel = new puskesmasModel();

        return view('admin/datapuskesmas', $data);
    }

    public function tambahpuskesmas()
    {
        $data  = [
            'title' => 'Tambah data puskesmas',
            'validation' => \Config\Services::validation(),
        ];
        // $puskesmasModel = new \App\Models\puskesmasModel();
        // $puskesmasModel = new puskesmasModel();

        return view('admin/tambahpuskesmas', $data);
    }

    public function save()
    {
        //validasi input
        if(!$this->validate([
           'puskesmas' => [
               'rules' => 'required',
               'errors' => [
                   'required' => '{field} harus diisi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'notelp' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} harus diisi.'
                ]
            ],
            'posyandu' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} harus diisi.'
                ]
            ],
            'posalamat' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} harus diisi.'
                ]
            ],
            'posnohp' => [  
                'rules' => 'required',
                'errors' => [
                'required' => '{field} harus diisi.'
                ]
            ]
        ])
        ){
            return redirect()->to('/puskesmas/tambahpuskesmas')->withInput();
        }

        $this->puskesmasModel->save([
            'puskesmas' => $this->request->getVar('puskesmas'),
            'alamat' => $this->request->getVar('alamat'),
            'notelp' => $this->request->getVar('notelp'),
            'posyandu' => $this->request->getVar('posyandu'),
            'posalamat' => $this->request->getVar('posalamat'),
            'posnohp' => $this->request->getVar('posnohp')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/puskesmas');
    }

    public function detailpuskesmas()
    {
        $puskesmas = $this->puskesmasModel->findAll();
        
        $data  = [
            'title' => 'Detail data puskesmas',
            'puskesmas' => $puskesmas
        ];
        // $puskesmasModel = new \App\Models\puskesmasModel();
        // $puskesmasModel = new puskesmasModel();

        return view('admin/detailpuskesmas', $data);
    }

    public function editpuskesmas()
    {
        if(!$this->validate([
            'puskesmas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                 ]
             ],
             'alamat' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => '{field} harus diisi.'
                 ]
             ],
             'notelp' => [
                 'rules' => 'required',
                 'errors' => [
                 'required' => '{field} harus diisi.'
                 ]
             ],
             'posyandu' => [
                 'rules' => 'required',
                 'errors' => [
                 'required' => '{field} harus diisi.'
                 ]
             ],
             'posalamat' => [
                 'rules' => 'required',
                 'errors' => [
                 'required' => '{field} harus diisi.'
                 ]
             ],
             'posnohp' => [  
                 'rules' => 'required',
                 'errors' => [
                 'required' => '{field} harus diisi.'
                 ]
             ]
         ])
         ){
             return redirect()->to('/puskesmas/tambahpuskesmas')->withInput();
         }
 
         $this->puskesmasModel->save([
             'puskesmas' => $this->request->getVar('puskesmas'),
             'alamat' => $this->request->getVar('alamat'),
             'notelp' => $this->request->getVar('notelp'),
             'posyandu' => $this->request->getVar('posyandu'),
             'posalamat' => $this->request->getVar('posalamat'),
             'posnohp' => $this->request->getVar('posnohp')
         ]);
 
         session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
 
         return redirect()->to('/puskesmas');
       
    }

    public function hapuspuskesmas($id)
    {
        //cari gambar berdasarkan id
        $puskesmas = $this->puskesmasModel->find($id);

        //cek jika file gambarnya default.png
        if($puskesmas['foto'] != 'default.png'){
            //hapus gambar
            unlink('admin/production/images/foto/' . $puskesmas['foto']);
        }

        $this->puskesmasModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/puskesmas');
    }
}