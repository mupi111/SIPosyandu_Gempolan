<?php

namespace App\Controllers;

use App\Models\kaderModel;

class Kader extends BaseController
{
    protected $kaderModel;
    public function __construct()
    {
        $this->kaderModel = new KaderModel();
    }

    public function index()
    {
        // $kader = $this->kaderModel->findAll();
        $currentPage = $this->request->getVar('page_kader') ? $this->request->getVar('page_kader') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $kader = $this->kaderModel->search($keyword);
        }else{
            $kader = $this->kaderModel;
        }

        $data  = [
            'kader' => $kader->paginate(5, 'kader'),
            'pager' => $this->kaderModel->pager,
            'currentPage' => $currentPage
        ];
        $data['title'] = 'Data Kader';
        // $kaderModel = new \App\Models\kaderModel();
        // $kaderModel = new kaderModel();

        return view('admin/datakader', $data);
    }

    public function tambahkader()
    {
        $data  = [
            'title' => 'Tambah data kader',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/tambahkader', $data);
    }

    public function save()
    {
        //validasi input
        if(!$this->validate([
            'kadernama' => [
                'rules' => 'required|is_unique[kader.kadernama]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'jabatan' => [
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
            'nohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[kader.username]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[kader.email]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'valid_email' => '{field} tidak valid.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]
        ])
        ){
            return redirect()->to('/kader/tambahkader')->withInput();
        }

        $this->kaderModel->save([
           'kadernama' => $this->request->getVar('kadernama'),
           'jabatan' => $this->request->getVar('jabatan'),
           'alamat' => $this->request->getVar('alamat'),
           'nohp' => $this->request->getVar('nohp'),
           'username' => $this->request->getVar('username'),
           'email' => $this->request->getVar('email'),
           'password' => $this->request->getVar('password'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/kader');
    }

    public function detailkader()
    {
        $kader = $this->kaderModel->findAll();
        
        $data  = [
            'title' => 'Detail data kader',
            'kader' => $kader
        ];
        // $kaderModel = new \App\Models\kaderModel();
        // $kaderModel = new kaderModel();

        return view('admin/detailkader', $data);
    }

    public function editkader()
    {
        if(!$this->validate([
            'kadernama' => [
                'rules' => 'required|is_unique[kader.kadernama]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'jabatan' => [
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
            'nohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[kader.username]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[kader.email]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'valid_email' => '{field} tidak valid.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]
        ])
        ){
            return redirect()->to('/kader/editkader')->withInput();
        }

        $this->kaderModel->save([
           'kadernama' => $this->request->getVar('kadernama'),
           'jabatan' => $this->request->getVar('jabatan'),
           'alamat' => $this->request->getVar('alamat'),
           'nohp' => $this->request->getVar('nohp'),
           'username' => $this->request->getVar('username'),
           'email' => $this->request->getVar('email'),
           'password' => $this->request->getVar('password'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/kader');
    }

    public function hapuskader($id)
    {
        $kader = $this->kaderModel->find($id);
  
        $this->kaderModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/kader');
    }
}