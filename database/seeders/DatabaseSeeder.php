<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!User::where('email', 'adminblk@mail.com')->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => 'adminblk@mail.com',
                'password' => 'adminblk',
                'role' => User::ROLE_ADMIN,
            ]);
        }

        if (Profile::count() == 0) {
            Profile::create([
                'organizational_structure' => 'img.png',
                'vission_and_mission' => '<h2><strong>Visi dan Misi</strong></h2>' .
                    '<p><strong>Visi:</strong></p>' .
                    '<p><strong>Misi:</strong></p>',
            ]);
        }
    }
}
