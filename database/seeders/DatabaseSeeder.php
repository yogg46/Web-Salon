<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\detailLayanan;
use App\Models\Jasa;
use App\Models\Kategori;
use App\Models\Layanan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(Userseeder::class);
        \App\Models\User::factory(10)->create();
        \App\Models\Suplier::factory(5)->create();
        \App\Models\Barang::factory(20)->create();
        \App\Models\Pembelian::factory(11)->create();
        \App\Models\detailPembelian::factory(20)->create();
        \App\Models\Pengambilan::factory(11)->create();

        // Kategori::factory(5)->create();
        // Jasa::factory(10)->create();
        Layanan::factory(5)->create();
        detailLayanan::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}