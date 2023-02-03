<?php

namespace App\Controllers;

use App\Models\PosyanduModel;

class Posyandu extends BaseController
{
    protected $posyanduModel;
    public function __construct()
    {
        $this->posyanduModel = new PosyanduModel();
    }

    public function index()
    {
        // $posyandu = $this->posyanduModel->findAll();
        $currentPage = $this->request->getVar('page_posyandu') ? $this->request->getVar('page_posyandu') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $posyandu = $this->posyanduModel->search($keyword);
        }else{
            $posyandu = $this->posyanduModel;
        }
        
        $data  = [
            'posyandu' => $posyandu->paginate(5, 'posyandu'),
            'pager' => $this->posyanduModel->pager,
            'currentPage' => $currentPage
        ];
        $data['posyandu'] = $this->posyanduModel->getAllData();
        $data['title'] = 'Data posyandu';
        // $posyanduModel = new \App\Models\posyanduModel();
        // $posyanduModel = new posyanduModel();
        return view('kader/dataposyandu', $data);
    }

    public function tambahposyandu()
    {
        // session();
        $data  = [
            'title' => 'Tambah data posyandu',
            'validation' => \Config\Services::validation()
        ];

        return view('kader/tambahposyandu', $data);
    }

    public function save()
    {
        //validasi input
        if(!$this->validate([
        'posyandu' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} harus diisi.'
            ]
        ],
        'kategori' => [
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
        ],
        'ketuapos' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} harus diisi.'
            ]
        ],
        'bidannama' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} harus diisi.'
            ]
        ],
        'kadernama' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} harus diisi.'
            ]
        ]
        ])
        ){
            return redirect()->to('/posyandu/tambahposyandu')->withInput();
        }

        $this->posyanduModel->save([
            'posyandu' => $this->request->getVar('posyandu'),
            'kategori' => $this->request->getVar('kategori'),
            'posalamat' => $this->request->getVar('posalamat'),
            'posnohp' => $this->request->getVar('posnohp'),
            'ketuapos' => $this->request->getVar('ketuapos'),
            'bidannama' => $this->request->getVar('bidannama'),
            'kadernama' => $this->request->getVar('kadernama')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/posyandu');
    }

    public function detailposyandu()
    {
        $posyandu = $this->posyanduModel->findAll();
        
        $data  = [
            'title' => 'Detail data posyandu',
            'posyandu' => $posyandu
        ];

        if(empty($data['users'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Detail Data User Tidak Ditemukan.');   
        }

        return view('kader/detailposyandu', $data);
    }

    public function editposyandu()
    {
        $posyandu = $this->posyanduModel->findAll();
        
        $data  = [
            'title' => 'Edit data posyandu',
            'posyandu' => $posyandu
        ];

        return view('kader/editposyandu', $data);
    }

    public function hapusposyandu()
    {
        $posyandu = $this->posyanduModel->findAll();
        
        $data  = [
            'title' => 'Hapus data posyandu',
            'posyandu' => $posyandu
        ];

        return view('kader/hapusposyandu', $data);
    }
}