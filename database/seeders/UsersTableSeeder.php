<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrador General',
            'email' => 'admin@criptoguard.com',
            'password' => Hash::make('Admin1234!'),
        ]);

        User::create([
            'name' => 'Carlos Martínez',
            'email' => 'cmartinez@empresa.com',
            'password' => Hash::make('User1234!'),
        ]);

        User::create([
            'name' => 'Lucía Fernández',
            'email' => 'lfernandez@empresa.com',
            'password' => Hash::make('User1234!'),
        ]);
    }
}
