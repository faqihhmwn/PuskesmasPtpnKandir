<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pengguna', 'nama', 'jabatan', 'tgl_lahir', 'umur',
        'jenis_kelamin', 'agama', 'pendidikan', 'no_hp',
        'email', 'alamat', 'jadwal'
    ];
}
