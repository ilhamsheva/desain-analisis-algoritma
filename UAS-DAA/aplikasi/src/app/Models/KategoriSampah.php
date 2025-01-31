<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriSampah extends Model
{
    use HasFactory;
    protected $fillable = ['kategori_nama'];

    // Relasi One to Many dengan model Sampah
    public function sampah() {
        return $this->hasMany(Sampah::class);
    }
}
