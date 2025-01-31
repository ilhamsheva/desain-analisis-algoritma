<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriSampah;

class KategoriSampahSeeder extends Seeder
{
    /**
     * Seed the application's database with sampah categories.
     */
    public function run(): void
    {
        // Membuat beberapa kategori sampah
        $kategori = ['Organik', 'Anorganik', 'B3', 'Elektronik'];
        foreach ($kategori as $kat) {
            KategoriSampah::create(['kategori_nama' => $kat]);
        }
    }
}
