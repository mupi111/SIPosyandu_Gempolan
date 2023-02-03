<?php

namespace App\Controllers;

use App\Models\KbModel;

class Kb extends BaseController
{
    protected $kbModel;
    public function __construct()
    {
        $this->kbModel = new KbModel();
    }

    public function index()
    {
        // $kb = $this->kbModel->findAll();
        $currentPage = $this->request->getVar('page_kb') ? $this->request->getVar('page_kb') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $kb = $this->kbModel->search($keyword);
        }else{
            $kb = $this->kbModel;
        }
        
        $data  = [
            'kb' => $kb->paginate(5, 'kb'),
            'pager' => $this->kbModel->pager,
            'currentPage' => $currentPage
        ];
        $data['kb'] = $this->kbModel->getAllData();
        $data['title'] = 'Data KB';
        // $kbModel = new \App\Models\kbModel();
        // $kbModel = new kbModel();
        return view('kader/datakb', $data);
    }

    public function tambahkb()
    {
        // session();
        $data  = [
            'title' => 'Tambah data KB',
            'validation' => \Config\Services::validation()
        ];

        return view('kader/tambahkb', $data);
    }

    public function save()
    {
        //validasi input
        if(!$this->validate([
            'tgl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'jeniskb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'ayahnama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'ibunama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ]
        ])
        ){
            return redirect()->to('/kb/tambahkb')->withInput();
        }

        $this->kbModel->save([
            'tgl' => $this->request->getVar('tgl'),
            'jeniskb' => $this->request->getVar('jeniskb'),
            'ayahnama' => $this->request->getVar('ayahnama'),
            'ibunama' => $this->request->getVar('ibunama')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/kb');
    }

    public function detailkb()
    {
        $kb = $this->kbModel->findAll();
        
        $data  = [
            'title' => 'Detail data KB',
            'kb' => $kb
        ];

        if(empty($data['users'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Detail Data User Tidak Ditemukan.');   
        }

        return view('kader/detailkb', $data);
    }

    public function editkb()
    {
        $kb = $this->kbModel->findAll();
        
        $data  = [
            'title' => 'Edit data kb',
            'kb' => $kb
        ];

        return view('kader/editkb', $data);
    }

    public function hapuskb()
    {
        $kb = $this->kbModel->findAll();
        
        $data  = [
            'title' => 'Hapus data kb',
            'kb' => $kb
        ];

        return view('kader/hapuskb', $data);
    }
}