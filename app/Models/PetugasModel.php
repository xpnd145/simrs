<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $table = 'petugas';
    protected $primaryKey = 'nip';
    protected $useAutoIncrement = false;
    protected $useTimeStamps = false;
    protected $allowedFields = ['nip', 'nama', 'jk', 'tmp_lahir', 'tgl_lahir', 'alamat', 'password'];

    protected $validationRules = 'signup';
}
