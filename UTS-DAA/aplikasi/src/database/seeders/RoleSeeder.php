<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Correct method name: firstOrCreate()
        Role::firstOrcreate(['name' => 'super_admin', 'guard_name' => 'web']);
        Role::firstOrCreate([
            'name' => 'Mahasiswa',
            'guard_name' => 'web',
        ]);

        Role::firstOrCreate([
            'name' => 'Kaprodi',
            'guard_name' => 'web',
        ]);
    }
}
