<?php

// app/Models/Pendaftaran.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = ['id_beasiswa', 'tanggal_daftar', 'penghasilan_ortu', 'semester_saat_daftar', 'ipk_saat_daftar', 'nim', 'status_verifikasi', 'status_seleksi'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'id_beasiswa');
    }

    public function berkas()
    {
        return $this->hasMany(Berkas::class, 'id_pendaftaran');
    }

    public function penerimaBeasiswa()
    {
        return $this->hasOne(PenerimaBeasiswa::class, 'id_pendaftaran');
    }
}
