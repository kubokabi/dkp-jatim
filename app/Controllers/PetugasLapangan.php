<?php

namespace App\Controllers;

use App\Models\LokasiModel;
use App\Models\UserModel;

class PetugasLapangan extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id');
        $model = new UserModel();
        $lokasiModel = new LokasiModel();

        // Ambil data pengguna berdasarkan user_id
        $user = $model->find($userId);

        // Ambil lokasi berdasarkan user_id
        $lokasi = $lokasiModel->where('id_users', $userId)->findAll();

        // Kirim data pengguna dan lokasi ke view
        return view('PetugasLapangan/dashboard', [
            'user' => $user,
            'lokasi' => $lokasi
        ]);
    }
}
