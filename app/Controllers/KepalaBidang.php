<?php

namespace App\Controllers;
use App\Models\UserModel;

class KepalaBidang extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id');
        $model = new UserModel(); 

        // Ambil data pengguna berdasarkan user_id
        $user = $model->find($userId); 

        // Kirim data pengguna dan lokasi ke view
        return view('KepalaBidang/dashboard', [
            'user' => $user, 
        ]);
    }
}
