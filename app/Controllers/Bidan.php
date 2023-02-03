<?php

namespace App\Controllers;

use App\Models\BidanModel;

class Bidan extends BaseController
{
    protected $bidanModel;
    public function __construct()
    {
        $this->bidanModel = new BidanModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_bidan') ? $this->request->getVar('page_bidan') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $bidan = $this->bidanModel->search($keyword);
        }else{
            $bidan = $this->bidanModel;
        }

        $data  = [
            'bidan' => $bidan->paginate(5, 'bidan'),
            'pager' => $this->bidanModel->pager,
            'currentPage' => $currentPage,
            'bidan' => $this->bidanModel->getBidan()
        ];
        $data['title'] = 'Data Bidan';
        // $bidanModel = new \App\Models\BidanModel();
        // $bidanModel = new BidanModel();

        return view('admin/databidan', $data);
    }

    public function tambahbidan()
    {
        $data  = [
            'title' => 'Tambah data Bidan',
            'validation' => \Config\Services::validation(),
        ];
        // $bidanModel = new \App\Models\BidanModel();
        // $bidanModel = new BidanModel();

        return view('admin/tambahbidan', $data);
    }

    public function save()
    {
        //validasi input
        if(!$this->validate([
           'bidannama' => [
               'rules' => 'required',
               'errors' => [
                   'required' => '{field} harus diisi.'
               ]
           ],
           'foto' => [
            'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
            'errors' => [
                'max_size' => 'Ukuran foto terlalu besar.',
                'is_image' => 'Yang anda pilih bukan gambar.',
                'mime_in' => 'Yang anda pilih bukan gambar.'
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
            ]
        ])
        ){
            return redirect()->to('/bidan/tambahbidan')->withInput();
        }

        //ambil gambar
        $fileFoto = $this->request->getFile('foto');
        //cek gambar, apakah tidak ada gambar diupload
        if($fileFoto->getError() == 4){
            $namaFoto = 'default.png';
        }else{
            //generate nama file random
            $namaFoto = $fileFoto->getRandomName();
            //pindahkan file ke folder img
            $fileFoto->move('admin/production/images/foto', $namaFoto);
        }

        //ambil nama file
        $namaFoto = $fileFoto->getRandomName();
        //pindahkan file ke folder img
        $fileFoto->move('admin/production/images/foto', $namaFoto);

        $this->bidanModel->save([
           'bidannama' => $this->request->getVar('bidannama'),
           'foto' => $namaFoto,
           'alamat' => $this->request->getVar('alamat'),
           'notelp' => $this->request->getVar('notelp')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/bidan');
    }

    public function detailbidan($bidannama)
    {
        // $bidan = $this->bidanModel->findAll();

        $data  = [
            'title' => 'Detail Data Bidan',
            'bidan' => $this->bidanModel->getBidan($bidannama),
            'validation' => \Config\Services::validation()
        ];
        // $bidanModel = new \App\Models\BidanModel();
        // $bidanModel = new BidanModel();

        return view('admin/detailbidan', $data);
    }

    public function editbidan()
    {
        if(!$this->validate([
            'bidannama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'foto' => [
             'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
             'errors' => [
                 'max_size' => 'Ukuran foto terlalu besar.',
                 'is_image' => 'Yang anda pilih bukan gambar.',
                 'mime_in' => 'Yang anda pilih bukan gambar.'
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
             ]
         ])
         ){
             return redirect()->to('/bidan/editbidan')->withInput();
         }

        //ambil gambar
        $fileFoto = $this->request->getFile('foto');

        //cek gambar, apakah tetap gambar lama
        if($fileFoto->getError() == 4){
            $namaFoto = $this->request->getVar('fotoLama');
        }else{
        //generate nama file random
        $namaFoto = $fileFoto->getRandomName();
        //pindahkan file ke folder img
        $fileFoto->move('admin/production/images/foto', $namaFoto);
        //hapus file yang lama
        unlink('admin/production/images/foto/' . $this->request->getVar('fotoLama'));
        }

         $this->bidanModel->save([
            'bidannama' => $this->request->getVar('bidannama'),
            'foto' => $namaFoto,
            'alamat' => $this->request->getVar('alamat'),
            'notelp' => $this->request->getVar('notelp')
         ]);
 
         session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
 
         return redirect()->to('/bidan');
       
    }

    public function hapusbidan($id)
    {
        //cari gambar berdasarkan id
        $bidan = $this->bidanModel->find($id);

        //cek jika file gambarnya default.png
        if($bidan['foto'] != 'default.png'){
            //hapus gambar
            unlink('admin/production/images/foto/' . $bidan['foto']);
        }

        $this->bidanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/bidan');
    }
}