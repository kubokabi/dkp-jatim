<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLokasiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_lokasi' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_users' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'lokasi' => [
                'type' => 'ENUM',
                'constraint' => ['TPI Kidang Lor', 'Roban Barat', 'Roban Timur', 'Celong'],
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id_lokasi', true);
        $this->forge->addForeignKey('id_users', 'users', 'id_users', 'CASCADE', 'CASCADE');
        $this->forge->createTable('lokasi');
    }

    public function down()
    {
        $this->forge->dropForeignKey('lokasi', 'lokasi_id_users_foreign'); // Menghapus foreign key
        $this->forge->dropTable('lokasi');
    }
}
