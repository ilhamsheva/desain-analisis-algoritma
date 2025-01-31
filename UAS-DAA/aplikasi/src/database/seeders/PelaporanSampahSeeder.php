<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PelaporanSampah;

class PelaporanSampahSeeder extends Seeder
{
    /**
     * Seed the application's database with trash reports.
     */
    public function run(): void
    {
        PelaporanSampah::create([
            'user_id' => 2, // User
            'sampah_id' => 1, // Botol Plastik
            'tanggal' => now(),
            'lokasi' => 'Jalan Merdeka No.10',
            'keterangan' => 'Banyak botol plastik berserakan di sekitar taman',
        ]);

        PelaporanSampah::create([
            'user_id' => 2, // User
            'sampah_id' => 3, // Baterai Bekas
            'tanggal' => now(),
            'lokasi' => 'Jalan Sudirman No.20',
            'keterangan' => 'Baterai bekas ditemukan di tempat sampah umum',
        ]);
    }
}
