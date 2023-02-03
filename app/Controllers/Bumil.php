<?php

namespace App\Controllers;

use App\Models\BumilModel;

class Bumil extends BaseController
{
    protected $bumilModel;
    public function __construct()
    {
        $this->bumilModel = new BumilModel();
    }

    public function index()
    {
        // $bumil = $this->bumilModel->findAll();
        $currentPage = $this->request->getVar('page_bumil') ? $this->request->getVar('page_bumil') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $bumil = $this->bumilModel->search($keyword);
        }else{
            $bumil = $this->bumilModel;
        }

        $data  = [
            'bumil' => $bumil->paginate(5, 'bumil'),
            'pager' => $this->bumilModel->pager,
            'currentPage' => $currentPage
        ];
        $data['bumil'] = $this->bumilModel->getAllData();
        $data['title'] = 'Data Bumil';
        // $bumilModel = new \App\Models\bumilModel();
        // $bumilModel = new bumilModel();

        return view('kader/databumil', $data);
    }

    public function tambahbumil()
    {
        $data  = [
            'title' => 'Tambah data bumil',
            'validation' => \Config\Services::validation()
        ];

        return view('kader/tambahbumil', $data);
    }

    public function save()
    {
        if(!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[bumil.nik]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'bumilnama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'anakke' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'ibunohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'ayahnama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'ayahnohp' => [
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
        ])
        ){
            return redirect()->to('/bumil/tambahbumil')->withInput();
        }

        $this->bumilModel->save([
            'nik' => $this->request->getVar('nik'),
            'bumilnama' => $this->request->getVar('bumilnama'),
            'anakke' => $this->request->getVar('anakke'),
            'ibunohp' => $this->request->getVar('ibunohp'),
            'ayahnama' => $this->request->getVar('ayahnama'),
            'ayahnohp' => $this->request->getVar('ayahnohp'),
            'alamat' => $this->request->getVar('alamat'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/bumil');

    }

    public function detailbumil()
    {
        $bumil = $this->bumilModel->findAll();
        
        $data  = [
            'title' => 'Detail data bumil',
            'bumil' => $bumil
        ];
        // $bumilModel = new \App\Models\bumilModel();
        // $bumilModel = new bumilModel();

        return view('kader/detailbumil', $data);
    }

    public function editbumil()
    {
        $bumil = $this->bumilModel->findAll();
        
        $data  = [
            'title' => 'Edit data bumil',
            'bumil' => $bumil
        ];
        // $bumilModel = new \App\Models\bumilModel();
        // $bumilModel = new bumilModel();

        return view('kader/editbumil', $data);
    }

    public function hapusbumil()
    {
        $bumil = $this->bumilModel->findAll();
        
        $data  = [
            'title' => 'Hapus data bumil',
            'bumil' => $bumil
        ];
        // $bumilModel = new \App\Models\bumilModel();
        // $bumilModel = new bumilModel();

        return view('kader/hapusbumil', $data);
    }

}