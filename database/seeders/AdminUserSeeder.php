<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin123', // Solo texto plano, se encriptará automáticamente
            'role' => 'admin' // Asegúrate de que el rol sea 'admin'
        ]);
    }
}
