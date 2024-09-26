<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_users' => 'Petugas 1',
                'username' => 'petugas1',
                'password' => password_hash('password1', PASSWORD_DEFAULT),
                'role' => 'petugas_lapangan',
            ],
            [
                'nama_users' => 'Kepala TPI',
                'username' => 'kepala_tpi',
                'password' => password_hash('password2', PASSWORD_DEFAULT),
                'role' => 'kepala_tpi',
            ],
            [
                'nama_users' => 'Kepala Bidang',
                'username' => 'kepala_bidang',
                'password' => password_hash('password3', PASSWORD_DEFAULT),
                'role' => 'kepala_bidang',
            ],
        ];

        // Menggunakan Query Builder untuk memasukkan data ke tabel users
        $this->db->table('users')->insertBatch($data);
    }
}
