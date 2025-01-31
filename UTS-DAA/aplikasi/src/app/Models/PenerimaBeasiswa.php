<?php

// app/Models/PenerimaBeasiswa.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBeasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['id_pendaftaran', 'tanggal_terima', 'nominal_diterima', 'periode_penerimaan', 'status_pencairan'];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }
}
