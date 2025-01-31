<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sampah;

class SampahSeeder extends Seeder
{
    /**
     * Seed the application's database with trash items.
     */
    public function run(): void
    {
        Sampah::create([
            'nama_sampah' => 'Botol Plastik',
            'kategori_id' => 2, // Anorganik
            'deskripsi' => 'Botol plastik bekas minuman',
            'status' => 'dapat didaur ulang',
        ]);

        Sampah::create([
            'nama_sampah' => 'Daun Kering',
            'kategori_id' => 1, // Organik
            'deskripsi' => 'Daun yang telah gugur dari pohon',
            'status' => 'dapat didaur ulang',
        ]);

        Sampah::create([
            'nama_sampah' => 'Baterai Bekas',
            'kategori_id' => 3, // B3
            'deskripsi' => 'Baterai yang sudah tidak digunakan',
            'status' => 'tidak dapat didaur ulang',
        ]);
    }
}
