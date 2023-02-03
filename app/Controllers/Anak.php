<?php

namespace App\Controllers;

use App\Models\AnakModel;

class Anak extends BaseController
{
    protected $anakModel;
    public function __construct()
    {
        $this->anakModel = new AnakModel();
    }

    public function index()
    {
        // $anak = $this->anakModel->findAll();
        $currentPage = $this->request->getVar('page_anak') ? $this->request->getVar('page_anak') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $anak = $this->anakModel->search($keyword);
        }else{
            $anak = $this->anakModel;
        }
        
        $data  = [
            'anak' => $anak->paginate(5, 'anak'),
            'pager' => $this->anakModel->pager,
            'currentPage' => $currentPage
        ];
        $data['anak'] = $this->anakModel->getAllData();
        $data['title'] = 'Data Anak';
        // $anakModel = new \App\Models\anakModel();
        // $anakModel = new anakModel();
        return view('kader/dataanak', $data);
    }

    public function tambahanak()
    {
        // session();
        $data  = [
            'title' => 'Tambah data anak',
            'validation' => \Config\Services::validation()
        ];

        return view('kader/tambahanak', $data);
    }

    public function save()
    {
        //validasi input
        if(!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[anak.nik]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'anaknama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'tmptlhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'tgllhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'namatmptlhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'jk' => [
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
            'ibunama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]
        ])
        ){
            return redirect()->to('/anak/tambahanak')->withInput();
        }

        $this->anakModel->save([
            'nik' => $this->request->getVar('nik'),
            'anaknama' => $this->request->getVar('anaknama'),
            'tmptlhr' => $this->request->getVar('tmptlhr'),
            'tgllhr' => $this->request->getVar('tgllhr'),
            'namatmptlhr' => $this->request->getVar('namatmptlhr'),
            'jk' => $this->request->getVar('jk'),
            'ayahnama' => $this->request->getVar('ayahnama'),
            'ibunama' => $this->request->getVar('ibunama')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/anak');
    }

    public function detailanak()
    {
        $anak = $this->anakModel->findAll();
        
        $data  = [
            'title' => 'Detail data anak',
            'anak' => $anak
        ];

        if(empty($data['users'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Detail Data User Tidak Ditemukan.');   
        }

        return view('kader/detailanak', $data);
    }

    public function editanak()
    {
        $anak = $this->anakModel->findAll();
        
        $data  = [
            'title' => 'Edit data anak',
            'anak' => $anak
        ];

        return view('kader/editanak', $data);
    }

    public function hapusanak()
    {
        $anak = $this->anakModel->findAll();
        
        $data  = [
            'title' => 'Hapus data anak',
            'anak' => $anak
        ];

        return view('kader/hapusanak', $data);
    }
}