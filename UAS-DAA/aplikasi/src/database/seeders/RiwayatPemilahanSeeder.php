<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiwayatPemilahan;

class RiwayatPemilahanSeeder extends Seeder
{
    /**
     * Seed the application's database with sorting history.
     */
    public function run(): void
    {
        RiwayatPemilahan::create([
            'user_id' => 2, // User
            'sampah_id' => 1, // Botol Plastik
            'tanggal_pemilahan' => now(),
        ]);

        RiwayatPemilahan::create([
            'user_id' => 2, // User
            'sampah_id' => 2, // Daun Kering
            'tanggal_pemilahan' => now(),
        ]);
    }
}
