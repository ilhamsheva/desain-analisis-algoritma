<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berkas;

class BerkasSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Berkas::create([
                'id_pendaftaran' => rand(1, 10),
                'tanggal_upload' => now()->subDays(rand(1, 180)),
                'jenis_berkas' => 'Jenis Berkas ' . $i,
                'nama_file' => 'berkas_' . $i . '.pdf',
                'status_verifikasi' => ['pending', 'valid', 'invalid'][rand(0, 2)],
                'keterangan' => 'Keterangan berkas ' . $i,
            ]);
        }
    }
}
