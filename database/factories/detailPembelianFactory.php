<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\Pembelian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\detailPembelian>
 */
class detailPembelianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $barang = Barang::pluck('id');
        $pembelian = Pembelian::pluck('id');
        return [
            'jumlah' => $this->faker->numberBetween($min = 5, $max = 100),
            'harga' => $this->faker->numberBetween($min = 5000, $max = 100000),
            'subtotal' => $this->faker->numberBetween($min = 50000, $max = 1000000),
            'barang_id' => $this->faker->randomElement($barang),
            'pembelian_id' => $this->faker->randomElement($pembelian),
        ];
    }
}