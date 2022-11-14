<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            // 'NIK' => '12345678901234567',
            // 'no_telepon' => '123456789012',
            'role' => 'admin',
            'status' => 'aktif',
        ]);
        User::create([
            'name' => 'kasir',
            'username' => 'kasir',
            'email' => 'kasir@kasir.com',
            'password' => bcrypt('password'),
            // 'NIK' => '12345678901234567',
            // 'no_telepon' => '123456789012',
            'role' => 'kasir',
            'status' => 'aktif',
        ]);
    }
}