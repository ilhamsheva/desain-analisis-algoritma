<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pendaftaran;

class PendaftaranSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Pendaftaran::create([
                'id_beasiswa' => rand(1, 10),
                'nim' => str_pad($i, 4, '0', STR_PAD_LEFT), // Now it's a numeric value like '0001'
                'tanggal_daftar' => now()->subDays(rand(1, 365)),
                'penghasilan_ortu' => number_format(rand(1000000, 10000000) / 1000, 3, '.', ''),
                'semester_saat_daftar' => rand(1, 8),
                'ipk_saat_daftar' => rand(20, 40) / 10,
                'status_verifikasi' => ['pending', 'diterima', 'ditolak'][rand(0, 2)],
                'status_seleksi' => ['belum', 'lulus', 'tidak_lulus'][rand(0, 2)],
            ]);
        }
    }
}
