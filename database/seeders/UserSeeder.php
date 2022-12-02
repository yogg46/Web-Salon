<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Jasa;
use App\Models\Kategori;
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
            // 'username' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            // 'NIK' => '12345678901234567',
            // 'no_telepon' => '123456789012',
            'role' => 'admin',
            'status' => 'aktif',
        ]);
        User::create([
            'name' => 'kasir',
            // 'username' => 'kasir',
            'email' => 'kasir@kasir.com',
            'password' => bcrypt('password'),
            // 'NIK' => '12345678901234567',
            // 'no_telepon' => '123456789012',
            'role' => 'kasir',
            'status' => 'aktif',
        ]);
        User::create([
            'name' => 'gudang',
            // 'username' => 'gudang',
            'email' => 'gudang@gudang.com',
            'password' => bcrypt('password'),
            // 'NIK' => '12345678901234567',
            // 'no_telepon' => '123456789012',
            'role' => 'gudang',
            'status' => 'aktif',
        ]);
        User::create([
            'name' => 'bos',
            // 'username' => 'bos',
            'email' => 'bos@bos.com',
            'password' => bcrypt('password'),
            // 'NIK' => '12345678901234567',
            // 'no_telepon' => '123456789012',
            'role' => 'bos',
            'status' => 'aktif',
        ]);

        Kategori::create([
            'id' => '1',
            'kategori' => 'Hair Styling',
        ]);
        Kategori::create([
            'id' => '2',
            'kategori' => 'Hair Spa',
        ]);
        Kategori::create([
            'id' => '3',
            'kategori' => 'Nail Art',
        ]);
        Kategori::create([
            'id' => '4',
            'kategori' => 'Keratin',
        ]);
        Kategori::create([
            'id' => '5',
            'kategori' => 'Smoothing',
        ]);
        Kategori::create([
            'id' => '6',
            'kategori' => 'Facial',
        ]);
        Kategori::create([
            'id' => '7',
            'kategori' => 'Creambath',
        ]);
        Kategori::create([
            'id' => '8',
            'kategori' => 'Cutting',
        ]);


        Jasa::create([
            'nama_jasa' => 'Toning / Glossy',
            'harga' => '250000',
            'kategori_id' => '1',
        ]);
        Jasa::create([
            'nama_jasa' => 'Coloring',
            'harga' => '165000',
            'kategori_id' => '1',
        ]);
        Jasa::create([
            'nama_jasa' => 'Balayage',
            'harga' => '95000',
            'kategori_id' => '1',
        ]);
        Jasa::create([
            'nama_jasa' => 'Peek a Boo',
            'harga' => '185000',
            'kategori_id' => '1',
        ]);
        Jasa::create([
            'nama_jasa' => 'Hightlight',
            'harga' => '165000',
            'kategori_id' => '1',
        ]);
        Jasa::create([
            'nama_jasa' => 'Ombre Hair',
            'harga' => '250000',
            'kategori_id' => '1',
        ]);
        Jasa::create([
            'nama_jasa' => 'Loreal',
            'harga' => '110000',
            'kategori_id' => '2',
        ]);
        Jasa::create([
            'nama_jasa' => 'Gold well',
            'harga' => '130000',
            'kategori_id' => '2',
        ]);
        Jasa::create([
            'nama_jasa' => 'Vanola',
            'harga' => '120000',
            'kategori_id' => '2',
        ]);
        Jasa::create([
            'nama_jasa' => 'Ilvasto',
            'harga' => '120000',
            'kategori_id' => '2',
        ]);
        Jasa::create([
            'nama_jasa' => 'Nail Gel Polos',
            'harga' => '50000',
            'kategori_id' => '3',
        ]);
        Jasa::create([
            'nama_jasa' => 'Nail Design',
            'harga' => '10000',
            'kategori_id' => '3',
        ]);
        Jasa::create([
            'nama_jasa' => 'Accesoris',
            'harga' => '15000',
            'kategori_id' => '3',
        ]);
        Jasa::create([
            'nama_jasa' => 'Nail extention',
            'harga' => '100000',
            'kategori_id' => '3',
        ]);
        Jasa::create([
            'nama_jasa' => 'Filler Hair',
            'harga' => '175000',
            'kategori_id' => '4',
        ]);
        Jasa::create([
            'nama_jasa' => 'Keratin Booster',
            'harga' => '175000',
            'kategori_id' => '4',
        ]);
        Jasa::create([
            'nama_jasa' => 'Keratin Permanent',
            'harga' => '485000',
            'kategori_id' => '4',
        ]);
        Jasa::create([
            'nama_jasa' => 'Gold well Kerasilk',
            'harga' => '600000',
            'kategori_id' => '5',
        ]);
        Jasa::create([
            'nama_jasa' => 'Loreal',
            'harga' => '400000',
            'kategori_id' => '5',
        ]);
        Jasa::create([
            'nama_jasa' => 'Ilvasto',
            'harga' => '325000',
            'kategori_id' => '5',
        ]);
        Jasa::create([
            'nama_jasa' => 'Matrix',
            'harga' => '250000',
            'kategori_id' => '5',
        ]);
        Jasa::create([
            'nama_jasa' => 'Cbd',
            'harga' => '200000',
            'kategori_id' => '5',
        ]);
        Jasa::create([
            'nama_jasa' => 'Wonder wave',
            'harga' => '350000',
            'kategori_id' => '5',
        ]);
        Jasa::create([
            'nama_jasa' => 'Facial',
            'harga' => '65000',
            'kategori_id' => '6',
        ]);
        Jasa::create([
            'nama_jasa' => 'Ear Candle',
            'harga' => '45000',
            'kategori_id' => '6',
        ]);
        Jasa::create([
            'nama_jasa' => 'Eyelash',
            'harga' => '125000',
            'kategori_id' => '6',
        ]);
        Jasa::create([
            'nama_jasa' => 'Make up + Styling hair',
            'harga' => '150000',
            'kategori_id' => '6',
        ]);
        Jasa::create([
            'nama_jasa' => 'Loreal',
            'harga' => '110000',
            'kategori_id' => '7',
        ]);
        Jasa::create([
            'nama_jasa' => 'Matrix',
            'harga' => '100000',
            'kategori_id' => '7',
        ]);
        Jasa::create([
            'nama_jasa' => 'Gold Well',
            'harga' => '130000',
            'kategori_id' => '7',
        ]);
        Jasa::create([
            'nama_jasa' => 'Fanola',
            'harga' => '120000',
            'kategori_id' => '7',
        ]);
        Jasa::create([
            'nama_jasa' => 'Ilvasto Blue Spa',
            'harga' => '120000',
            'kategori_id' => '7',
        ]);
        Jasa::create([
            'nama_jasa' => 'Cut Cuci Finger',
            'harga' => '60000',
            'kategori_id' => '8',
        ]);
        Jasa::create([
            'nama_jasa' => 'Cuci Finger Dry Include Styling',
            'harga' => '25000',
            'kategori_id' => '8',
        ]);
        Jasa::create([
            'nama_jasa' => 'Blow Dry',
            'harga' => '75000',
            'kategori_id' => '8',
        ]);
        Jasa::create([
            'nama_jasa' => 'Cuci Catok',
            'harga' => '75000',
            'kategori_id' => '8',
        ]);

    }
}