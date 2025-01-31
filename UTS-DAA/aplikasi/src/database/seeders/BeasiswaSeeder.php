<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Beasiswa;

class BeasiswaSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Beasiswa::create([
                'kuota' => rand(5, 20),
                'tanggal_mulai' => now()->subMonths(rand(1, 12)),
                'tanggal_selesai' => now()->addMonths(rand(1, 12)),
                'syarat' => 'Syarat Beasiswa ' . $i,
                'nama_beasiswa' => 'Beasiswa ' . $i,
                'jenis_beasiswa' => 'Jenis ' . rand(1, 3),
                'periode' => '2024',
                'status' => rand(0, 1) ? 'aktif' : 'nonaktif'
            ]);
        }
    }
}
