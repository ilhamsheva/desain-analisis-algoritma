<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiwayatPemilahan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'sampah_id', 'tanggal_pemilahan'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sampah(): BelongsTo
    {
        return $this->belongsTo(Sampah::class);
    }
}
