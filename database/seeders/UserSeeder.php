<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::truncate();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@dominio.com',
            'password' => Hash::make('admin123'),
        ]);
        User::create([
            'name' => 'Lalo Landa',
            'email' => 'lalo@dominio.com',
            'password' => Hash::make('lalo123'),
        ]);
        User::create([
            'name' => 'Test Tester',
            'email' => 'test@dominio.com',
            'password' => Hash::make('test123'),
        ]);
    }
}
