<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengumuman;

class PengumumanSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Pengumuman::create([
                'id_beasiswa' => rand(1, 10),
                'isi' => 'Isi pengumuman ' . $i,
                'judul' => 'Pengumuman ' . $i,
                'tanggal_post' => now()->subDays(rand(1, 30)),
                'status' => rand(0, 1) ? 'draft' : 'published',
            ]);
        }
    }
}
