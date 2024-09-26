<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LokasiSeeder extends Seeder
{
    public function run()
    {
        // Mendapatkan ID dari pengguna yang telah dimasukkan sebelumnya
        $users = $this->db->table('users')->get()->getResult();

        $data = [];

        foreach ($users as $user) {
            if ($user->role === 'petugas_lapangan') {
                $data[] = [
                    'id_users' => $user->id_users,
                    'lokasi' => 'TPI Kidang Lor',
                ];
            } elseif ($user->role === 'kepala_tpi') {
                $data[] = [
                    'id_users' => $user->id_users,
                    'lokasi' => 'Roban Barat',
                ];
            } 
        }

        // Menggunakan Query Builder untuk memasukkan data ke tabel lokasi
        $this->db->table('lokasi')->insertBatch($data);
    }
}
