<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat Akun Admin
        User::create([
            'name'     => 'Admin Tasty',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password123'), // Password ter-enkripsi
            'role'     => 'admin',
        ]);

        // 2. Buat Akun Member (Buat ngetes bedanya)
        User::create([
            'name'     => 'Member Tasty',
            'email'    => 'member@example.com',
            'password' => Hash::make('password123'),
            'role'     => 'member',
        ]);
    }
}