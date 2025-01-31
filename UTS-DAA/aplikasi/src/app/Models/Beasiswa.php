<?php

// app/Models/Beasiswa.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['kuota', 'tanggal_mulai', 'tanggal_selesai', 'syarat', 'nama_beasiswa', 'jenis_beasiswa', 'periode', 'status'];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'id_beasiswa');
    }

    public function pengumumans()
    {
        return $this->hasMany(Pengumuman::class, 'id_beasiswa');
    }
}
