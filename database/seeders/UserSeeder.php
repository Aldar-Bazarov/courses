<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Пользователь',
            'email' => 'user@example.com',
            'login' => 'user',
            'password' => Hash::make('user'),
            'avatar' => '21400.jpg',
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'Администратор',
            'email' => 'admin@example.com',
            'login' => 'admin',
            'password' => Hash::make('admin'),
            'avatar' => 'images (1).jpg',
            'role' => 'admin',
        ]);
    }
}
