<?php

// app/Models/Mahasiswa.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['semester', 'ipk', 'alamat', 'nim', 'nama', 'prodi', 'no_telp', 'email', 'angkatan'];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'nim', 'nim');
    }
}
