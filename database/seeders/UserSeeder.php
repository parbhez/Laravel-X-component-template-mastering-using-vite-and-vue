<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str; // Import Str
use Faker\Factory as Faker; // Import Faker
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); // Create a new Faker instance

        //For role_sponsorship_manager
            $SuperAdmin = User::create([
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'role' => 'superadmin',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10), // Corrected line
            ]);

            //For role_sponsorship_manager
            $user1 = User::create([
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10), // Corrected line
            ]);

             //For role_sponsorship_manager
             $user2 = User::create([
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10), // Corrected line
            ]);

            //For role_sponsorship_manager
            $masud = User::create([
                'name' => 'masud',
                'email' => 'masud@gmail.com',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10), // Corrected line
            ]);



    }
}
