<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LokasiModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            $role = session()->get('role');

            if ($role === 'petugas_lapangan') {
                return redirect()->to('/PetugasLapangan');
            } elseif ($role === 'kepala_tpi') {
                return redirect()->to('/KepalaTPI');
            } elseif ($role === 'kepala_bidang') {
                return redirect()->to('/KepalaBidang');
            } else {
                return redirect()->to('/login'); // Redirect ke halaman default jika role tidak dikenali
            }
        }
        return view('login');
    }

    public function authenticate()
    {
        $model = new UserModel();
        $lokasiModel = new LokasiModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');
        $lokasi = $this->request->getPost('lokasi');

        // Validasi inputan
        if (empty($username) || empty($password) || empty($role)) {
            return redirect()->back()->with('error', 'Semua kolom harus diisi')->withInput();
        }

        // Mencari user berdasarkan username
        $user = $model->where('username', $username)->first();

        // Memeriksa apakah username ada
        if (!$user) {
            return redirect()->back()->with('error', 'Username tidak ditemukan')->withInput();
        }

        // Memverifikasi password
        if (password_verify($password, $user['password'])) {
            // Memeriksa apakah role yang dipilih sesuai dengan role pengguna
            if ($user['role'] !== $role) {
                return redirect()->back()->with('error', 'Peran yang dipilih tidak sesuai Akun')->withInput();
            }

            // Jika role adalah kepala TPI atau petugas lapangan, lakukan validasi lokasi
            if ($role === 'kepala_tpi' || $role === 'petugas_lapangan') {
                if (empty($lokasi)) {
                    return redirect()->back()->with('error', 'Lokasi harus dipilih untuk peran ini')->withInput();
                }

                // Periksa apakah lokasi sesuai untuk pengguna
                $lokasiExists = $lokasiModel->where('id_users', $user['id_users'])
                    ->where('lokasi', $lokasi)
                    ->countAllResults();

                // Cek apakah lokasi valid untuk pengguna
                if ($lokasiExists === 0) {
                    return redirect()->back()->with('error', 'Lokasi tidak valid untuk pengguna ini')->withInput();
                }
            }

            // Set session data
            session()->set([
                'logged_in' => true,
                'user_id' => $user['id_users'],
                'role' => $user['role'],
            ]);

            // Redirect berdasarkan role
            switch ($user['role']) {
                case 'petugas_lapangan':
                    return redirect()->to('/PetugasLapangan');
                case 'kepala_tpi':
                    return redirect()->to('/KepalaTPI');
                case 'kepala_bidang':
                    return redirect()->to('/KepalaBidang');
                default:
                    return redirect()->to('/');
            }
        } else {
            // Jika kredensial tidak valid
            return redirect()->back()->with('error', 'Password Salah')->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
