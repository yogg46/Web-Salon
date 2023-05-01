<?php

namespace Database\Factories;

use App\Models\Jasa;
use App\Models\Layanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\detailLayanan>
 */
class detailLayananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $jasa = Jasa::pluck('id');
        $layanan = Layanan::pluck('id');
        $jasa = Jasa::all();
        // $pembelian = Pembelian::pluck('id');
        $barangItem = $this->faker->randomElement($jasa); // choose a random Barang
        $jumlah = $this->faker->numberBetween($min = 1, $max = 4);
        $harga = $barangItem->harga;
        return [
            'jumlah' => $jumlah,
            'harga' => $harga,
            'subtotal' =>  $harga * $jumlah,
            'layanan_id' => fake()->randomElement($layanan),
            'jasa_id' => fake()->randomElement($jasa),
        ];
    }
}
