<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Hagar Elbakry',
            'is_admin' => true,
            'username' => 'hagarelbakry',
            'email' => 'hagar@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('hagar123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Menna Baligh',
            'username' => 'mennabaligh',
            'email' => 'mennab@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('mennab123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Menna Hamada',
            'username' => 'mennahamada',
            'email' => 'mennah@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('mennah123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::factory(20)->create();
    }
}
