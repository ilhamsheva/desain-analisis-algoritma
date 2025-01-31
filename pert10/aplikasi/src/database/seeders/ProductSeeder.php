<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Adidas',
                'harga' => 1000,
                'category' => 'Sepatu',
            ],
            [
                'name' => 'Nike',
                'harga' => 999,
                'category' => 'Sepatu',
            ],
            [
                'name' => 'Levis',
                'harga' => 500,
                'category' => 'Celana',
            ],
            [
                'name'=> 'Uniqlo',
                'harga' => 100,
                'category' => 'Baju',
            ]
        ]);
    }
}
