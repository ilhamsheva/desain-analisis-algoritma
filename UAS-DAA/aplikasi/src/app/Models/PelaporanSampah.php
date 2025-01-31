<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelaporanSampah extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'sampah_id', 'tanggal', 'lokasi', 'keterangan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sampah()
    {
        return $this->belongsTo(Sampah::class);
    }
}
