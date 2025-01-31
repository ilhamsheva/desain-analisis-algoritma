<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call RoleSeeder first to ensure roles are available before user seeding
        $this->call(RoleSeeder::class);

        // Seed users
        $this->seedUsers();

        $this->call([
            MahasiswaSeeder::class,
            BeasiswaSeeder::class,
            PendaftaranSeeder::class,
            PengumumanSeeder::class,
            BerkasSeeder::class,
            PenerimaBeasiswaSeeder::class,
        ]);
    }

    private function seedUsers(): void
    {
        // Ensure that the users are only created if they do not exist
        if (! User::where('email', 'admin@admin.com')->exists()) {
            $users = User::factory()->createMany([
                [
                    'name' => 'Admin',
                    'email' => 'admin@admin.com',
                    'password' => bcrypt('password'),
                ],
                [
                    'name' => 'Mahasiswa',
                    'email' => 'mahasiswa@mahasiswa.com',
                    'password' => bcrypt('password'),
                ],
                [
                    'name' => 'Kaprodi',
                    'email' => 'kaprodi@kaprodi.com',
                    'password' => bcrypt('password'),
                ],
            ]);

            foreach ($users as $user) {
                // Assign roles based on email addresses (ensure roles exist first)
                if ($user->email == 'admin@admin.com') {
                    $user->assignRole('super_admin');
                } elseif ($user->email == 'mahasiswa@mahasiswa.com') {
                    $user->assignRole('Mahasiswa'); 
                } elseif ($user->email == 'kaprodi@kaprodi.com') {
                    $user->assignRole('Kaprodi');
                }
            }
        }
    }
}
