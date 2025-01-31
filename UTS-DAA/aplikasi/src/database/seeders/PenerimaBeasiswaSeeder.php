<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PenerimaBeasiswa;

class PenerimaBeasiswaSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            PenerimaBeasiswa::create([
                'id_pendaftaran' => rand(1, 10),
                'tanggal_terima' => now()->subMonths(rand(1, 6)),
                'nominal_diterima' => number_format(rand(1000000, 10000000) / 1000, 3, '.', ''),
                'periode_penerimaan' => '2024',
                'status_pencairan' => rand(0, 1) ? 'belum' : 'sudah',
            ]);
        }
    }
}
