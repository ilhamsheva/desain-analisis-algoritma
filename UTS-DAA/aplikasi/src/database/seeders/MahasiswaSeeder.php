<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Mahasiswa::create([
                'semester' => rand(1, 8),
                'ipk' => rand(20, 40) / 10,
                'alamat' => 'Jl. Contoh Alamat No. ' . $i,
                'nim' => 'NIM' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'nama' => 'Mahasiswa ' . $i,
                'prodi' => 'Program Studi ' . rand(1, 3),
                'no_telp' => '081234567' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'email' => 'mahasiswa' . $i . '@example.com',
                'angkatan' => '202' . rand(0, 3)
            ]);
        }
    }
}
