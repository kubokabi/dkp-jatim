<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_users';
    protected $allowedFields = ['nama_users', 'username', 'password', 'role', 'lokasi'];
}
