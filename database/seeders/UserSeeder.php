<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Ayotanding',
            'email' => 'admin@ayotanding.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User Demo',
            'email' => 'user@ayotanding.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Pemilik Lapangan',
            'email' => 'owner@ayotanding.com',
            'password' => Hash::make('password'),
            'role' => 'owner',
        ]);
    }
}
