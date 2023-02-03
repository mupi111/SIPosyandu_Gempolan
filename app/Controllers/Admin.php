<?php

namespace App\Controllers;
use App\Models\BidanModel;
// use App\Models\UserModel;

class Admin extends BaseController
{
    protected $dataModel;
    protected $bidanModel;
    public function __construct()
    {
        $this->dataModel = new \Myth\Auth\Models\UserModel();
        $this->bidanModel = new BidanModel();
    }

    public function index()
    {
        return view('admin/index');
    }

    public function datauser()
    {
        // $users = $this->userModel->findAll();
        $currentPage = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $users = $this->dataModel->search($keyword);
        }else{
            $users = $this->dataModel;
        }

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, username, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();
        
        $data  = [
            'title' => 'Data User',
            'users' => $users->paginate(5, 'users'),
            'pager' => $this->dataModel->pager,
            'currentPage' => $currentPage
        ];
        $data['users'] = $query->getResult();
        return view('admin/datauser', $data);
    }

    public function tambahuser()
    {
        $data = [
            'title' => 'Tambah data user',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/tambahuser', $data);
    }

    public function save()
    {
        //validasi input
        if(!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'password_hash' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'fullname' => [
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
            ]
        ])
        ){
            return redirect()->to('/admin/tambahuser')->withInput();
        }

        $this->dataModel->save([
           'username' => $this->request->getVar('username'),
           'email' => $this->request->getVar('email'),
           'password_hash' => $this->request->getVar('password_hash'),
           'fullname' => $this->request->getVar('fullname'),
           'nohp' => $this->request->getVar('nohp')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin');
    }

    public function detailuser()
    {
        $users = $this->dataModel->findAll(); 
        
        $data = [
            'title' => 'Detail data user',
            'users' => $users
        ];

        if(empty($data['users'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Detail Data User Tidak Ditemukan.');   
        }

        return view('admin/detailuser', $data);
    }

    public function edituser($id = 0)
    {
        // cek username
        $userslama = $this->dataModel->getUsers($this->request->getVar('id'));
        if($userslama['username'] == $this->request->getVar('username')){
            $rule_username = 'required';
        }elseif($userslama['email'] != $this->request->getVar('email')){
            $rule_email = 'required';
        }else{
            $rule_username = 'required|is_unique[users.username]';
            $rule_email = 'required|is_unique[users.email]';
        }

        if(!$this->validate([
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'email' => [
                'rules' => '$rule_email',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'password_hash' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'fullname' => [
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
            ]
        ])
        ){
            return redirect()->to('/admin/edituser')->withInput();
        }

        $this->dataModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password_hash' => $this->request->getVar('password_hash'),
            'fullname' => $this->request->getVar('fullname'),
            'nohp' => $this->request->getVar('nohp')
         ]);
 
         session()->setFlashdata('pesan', 'Data berhasil diedit.');

         return redirect()->to('/datauser');
    }

    public function hapususer($id)
    {
        $this->dataModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/datauser');
    }

// ======================== DATA BIDAN ================= //

    // public function databidan()
    // {
    //     // $bidan = $this->bidanModel->findAll();
    //     $currentPage = $this->request->getVar('page_bidan') ? $this->request->getVar('page_bidan') : 1;

    //     $keyword = $this->request->getVar('keyword');
    //     if($keyword){
    //         $bidan = $this->bidanModel->search($keyword);
    //     }else{
    //         $bidan = $this->bidanModel;
    //     }

    //     $data  = [
    //         'title' => 'Data Bidan',
    //         'bidan' => $this->bidanModel->paginate(5, 'bidan'),
    //         'pager' => $this->bidanModel->pager,
    //         'currentPage' => $currentPage
    //     ];
    //     // $bidanModel = new \App\Models\BidanModel();
    //     // $bidanModel = new BidanModel();

    //     return view('admin', $data);
    // }
  

    // public function tambahbidan()
    // {
    //     $data  = [
    //         'title' => 'Tambah data Bidan',
    //         'validation' => \Config\Services::validation(),
    //     ];
    //     // $bidanModel = new \App\Models\BidanModel();
    //     // $bidanModel = new BidanModel();

    //     return view('admin/tambahbidan', $data);
    // }

    // public function save()
    // {
    //     //validasi input
    //     if(!$this->validate([
    //        'bidannama' => [
    //            'rules' => 'required',
    //            'errors' => [
    //                'required' => '{field} harus diisi.'
    //            ]
    //        ],
    //        'foto' => [
    //         'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
    //         'errors' => [
    //             'max_size' => 'Ukuran foto terlalu besar.',
    //             'is_image' => 'Yang anda pilih bukan gambar.',
    //             'mime_in' => 'Yang anda pilih bukan gambar.'
    //             ]
    //         ],
    //         'alamat' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} harus diisi.'
    //                 ]
    //         ],
    //         'notelp' => [
    //             'rules' => 'required',
    //             'errors' => [
    //             'required' => '{field} harus diisi.'
    //             ]
    //         ]
    //     ])
    //     ){
    //         return redirect()->to('/bidan/tambahbidan')->withInput();
    //     }

    //     //ambil gambar
    //     $fileFoto = $this->request->getFile('foto');
    //     //cek gambar, apakah tidak ada gambar diupload
    //     if($fileFoto->getError() == 4){
    //         $namaFoto = 'default.png';
    //     }else{
    //         //generate nama file random
    //         $namaFoto = $fileFoto->getRandomName();
    //         //pindahkan file ke folder img
    //         $fileFoto->move('admin/production/images/foto', $namaFoto);
    //     }

    //     //ambil nama file
    //     $namaFoto = $fileFoto->getRandomName();
    //     //pindahkan file ke folder img
    //     $fileFoto->move('admin/production/images/foto', $namaFoto);

    //     $this->bidanModel->save([
    //        'bidannama' => $this->request->getVar('bidannama'),
    //        'foto' => $namaFoto,
    //        'alamat' => $this->request->getVar('alamat'),
    //        'notelp' => $this->request->getVar('notelp')
    //     ]);

    //     session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

    //     return redirect()->to('/bidan');
    // }

    // public function detailbidan()
    // {
    //     $bidan = $this->bidanModel->findAll();
        
    //     $data  = [
    //         'title' => 'Detail data Bidan',
    //         'bidan' => $bidan
    //     ];
    //     // $bidanModel = new \App\Models\BidanModel();
    //     // $bidanModel = new BidanModel();

    //     return view('admin/detailbidan', $data);
    // }

    // public function editbidan()
    // {
    //     if(!$this->validate([
    //         'bidannama' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} harus diisi.'
    //             ]
    //         ],
    //         'foto' => [
    //          'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
    //          'errors' => [
    //              'max_size' => 'Ukuran foto terlalu besar.',
    //              'is_image' => 'Yang anda pilih bukan gambar.',
    //              'mime_in' => 'Yang anda pilih bukan gambar.'
    //              ]
    //          ],
    //          'alamat' => [
    //              'rules' => 'required',
    //              'errors' => [
    //                  'required' => '{field} harus diisi.'
    //                  ]
    //          ],
    //          'notelp' => [
    //              'rules' => 'required',
    //              'errors' => [
    //              'required' => '{field} harus diisi.'
    //              ]
    //          ]
    //      ])
    //      ){
    //          return redirect()->to('/bidan/editbidan')->withInput();
    //      }

    //     //ambil gambar
    //     $fileFoto = $this->request->getFile('foto');

    //     //cek gambar, apakah tetap gambar lama
    //     if($fileFoto->getError() == 4){
    //         $namaFoto = $this->request->getVar('fotoLama');
    //     }else{
    //     //generate nama file random
    //     $namaFoto = $fileFoto->getRandomName();
    //     //pindahkan file ke folder img
    //     $fileFoto->move('admin/production/images/foto', $namaFoto);
    //     //hapus file yang lama
    //     unlink('admin/production/images/foto/' . $this->request->getVar('fotoLama'));
    //     }

    //      $this->bidanModel->save([
    //         'bidannama' => $this->request->getVar('bidannama'),
    //         'foto' => $namaFoto,
    //         'alamat' => $this->request->getVar('alamat'),
    //         'notelp' => $this->request->getVar('notelp')
    //      ]);
 
    //      session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
 
    //      return redirect()->to('/bidan');
       
    // }

    // public function hapusbidan($id)
    // {
    //     //cari gambar berdasarkan id
    //     $bidan = $this->bidanModel->find($id);

    //     //cek jika file gambarnya default.png
    //     if($bidan['foto'] != 'default.png'){
    //         //hapus gambar
    //         unlink('admin/production/images/foto/' . $bidan['foto']);
    //     }

    //     $this->bidanModel->delete($id);
    //     session()->setFlashdata('pesan', 'Data berhasil dihapus.');
    //     return redirect()->to('/bidan');
    // }
}
