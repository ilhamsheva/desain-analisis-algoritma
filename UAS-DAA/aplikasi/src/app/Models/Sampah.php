<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;

    protected $fillable = ['nama_sampah', 'kategori_id', 'deskripsi', 'status'];

    public function kategori() {
        return $this->belongsTo(KategoriSampah::class, 'kategori_id');
    }

    public function pelaporanSampah() {
        return $this->hasMany(PelaporanSampah::class);
    }

    public function riwayatPemilihan() {
        return $this->hasMany(RiwayatPemilahan::class);
    }
}
