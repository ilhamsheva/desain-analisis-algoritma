<?php

// app/Models/Berkas.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;

    protected $fillable = ['id_pendaftaran', 'tanggal_upload', 'jenis_berkas', 'nama_file', 'status_verifikasi', 'keterangan'];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }
}
