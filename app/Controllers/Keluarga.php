<?php

namespace App\Controllers;

use App\Models\keluargaModel;

class Keluarga extends BaseController
{
    protected $keluargaModel;
    public function __construct()
    {
        $this->keluargaModel = new KeluargaModel();
    }

    public function index()
    {
        // $keluarga = $this->keluargaModel->findAll();
        $currentPage = $this->request->getVar('page_keluarga') ? $this->request->getVar('page_keluarga') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $keluarga = $this->keluargaModel->search($keyword);
        }else{
            $keluarga = $this->keluargaModel;
        }

        $data  = [
            'keluarga' => $keluarga->paginate(5, 'keluarga'),
            'pager' => $this->keluargaModel->pager,
            'currentPage' => $currentPage
        ];
        $data['title'] = 'Data Keluarga';
        // $keluargaModel = new \App\Models\keluargaModel();
        // $keluargaModel = new keluargaModel();

        return view('kader/datakeluarga', $data);
    }

    public function tambahkeluarga()
    {
        $data  = [
            'title' => 'Tambah data keluarga',
            'validation' => \Config\Services::validation(),
        ];

        return view('kader/tambahkeluarga', $data);
    }

    public function save()
    {
        //validasi input
        if(!$this->validate([
            'nokk' => [
                'rules' => 'required|is_unique[keluarga.nokk]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'ayahnik' => [
                'rules' => 'required|is_unique[keluarga.ayahnik]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'ayahnama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ayahtmptlhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ayahtgllhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ayahagama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ayahpendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ayahpekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ayahnohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibunik' => [
                'rules' => 'required|is_unique[keluarga.ibunik]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'ibunama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibutmptlhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibutgllhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibuagama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibupendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibugoldar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibupekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibunohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ], 
            'jmlhanak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ]
        ])
        ){
            return redirect()->to('/keluarga/tambahkeluarga')->withInput();
        }

        $this->keluargaModel->save([
            'nokk' => $this->request->getVar('nokk'),
            'ayahnik' => $this->request->getVar('ayahnik'),
            'ayahnama' => $this->request->getVar('ayahnama'),
            'ayahtmptlhr' => $this->request->getVar('ayahtmptlhr'),
            'ayahtgllhr' => $this->request->getVar('ayahtgllhr'),
            'ayahagama' => $this->request->getVar('ayahagama'),
            'ayahpendidikan' => $this->request->getVar('ayahpendidikan'),
            'ayahpekerjaan' => $this->request->getVar('ayahpekerjaan'),
            'ayahnohp' => $this->request->getVar('ayahnohp'),
            'ibunik' => $this->request->getVar('ibunik'),
            'ibunama' => $this->request->getVar('ibunama'),
            'ibutmptlhr' => $this->request->getVar('ibutmptlhr'),
            'ibutgllhr' => $this->request->getVar('ibutgllhr'),
            'ibuagama' => $this->request->getVar('ibuagama'),
            'ibupendidikan' => $this->request->getVar('ibupendidikan'),
            'ibugoldar' => $this->request->getVar('ibugoldar'),
            'ibupekerjaan' => $this->request->getVar('ibupekerjaan'),
            'ibunohp' => $this->request->getVar('ibunohp'),
            'alamat' => $this->request->getVar('alamat'),
            'jmlhanak' => $this->request->getVar('jmlhanak')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/keluarga');
    }

    public function detailkeluarga()
    {
        $keluarga = $this->keluargaModel->findAll();
        
        $data  = [
            'title' => 'Detail data keluarga',
            'keluarga' => $keluarga
        ];
        // $keluargaModel = new \App\Models\keluargaModel();
        // $keluargaModel = new keluargaModel();

        return view('kader/detailkeluarga', $data);
    }

    public function editkeluarga()
    {
        if(!$this->validate([
            'nokk' => [
                'rules' => 'required|is_unique[keluarga.nokk]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'ayahnik' => [
                'rules' => 'required|is_unique[keluarga.ayahnik]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'ayahnama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ayahtmptlhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ayahtgllhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ayahagama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ayahpendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ayahpekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ayahnohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibunik' => [
                'rules' => 'required|is_unique[keluarga.ibunik]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'ibunama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibutmptlhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibutgllhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibuagama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibupendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibugoldar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibupekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ibunohp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ], 
            'jmlhanak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ]
        ])
        ){
            return redirect()->to('/keluarga/editkeluarga')->withInput();
        }

        $this->keluargaModel->save([
            'nokk' => $this->request->getVar('nokk'),
            'ayahnik' => $this->request->getVar('ayahnik'),
            'ayahnama' => $this->request->getVar('ayahnama'),
            'ayahtmptlhr' => $this->request->getVar('ayahtmptlhr'),
            'ayahtgllhr' => $this->request->getVar('ayahtgllhr'),
            'ayahagama' => $this->request->getVar('ayahagama'),
            'ayahpendidikan' => $this->request->getVar('ayahpendidikan'),
            'ayahpekerjaan' => $this->request->getVar('ayahpekerjaan'),
            'ayahnohp' => $this->request->getVar('ayahnohp'),
            'ibunik' => $this->request->getVar('ibunik'),
            'ibunama' => $this->request->getVar('ibunama'),
            'ibutmptlhr' => $this->request->getVar('ibutmptlhr'),
            'ibutgllhr' => $this->request->getVar('ibutgllhr'),
            'ibuagama' => $this->request->getVar('ibuagama'),
            'ibupendidikan' => $this->request->getVar('ibupendidikan'),
            'ibugoldar' => $this->request->getVar('ibugoldar'),
            'ibupekerjaan' => $this->request->getVar('ibupekerjaan'),
            'ibunohp' => $this->request->getVar('ibunohp'),
            'alamat' => $this->request->getVar('alamat'),
            'jmlhanak' => $this->request->getVar('jmlhanak')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/keluarga');
    }

    public function hapuskeluarga($id)
    {
        $keluarga = $this->keluargaModel->find($id);

        $this->keluargaModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/keluarga');
    }

}