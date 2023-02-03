<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data  = [
            'title' => 'Beranda',
        ];
        return view('welcome/index', $data);
    }

    public function about()
    {
        $data  = [
            'title' => 'Tentang Posyandu',
        ];
        return view('welcome/about', $data);
    }

    public function blogs()
    {
        $data  = [
            'title' => 'Layanan Posyandu',
        ];
        return view('welcome/blogs', $data);
        
    }

    // public function login()
    // {
    //     $data = [
    //         'title'  => 'Login',
    //         'config' => config('Auth'),
    //     ];
    //     return view('auth/login, $data');
        
    // }

}
