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
        $barang = Barang::all();
        $pembelian = Pembelian::pluck('id');
        $barangItem = $this->faker->randomElement($barang); // choose a random Barang
        $jumlah = $this->faker->numberBetween($min = 5, $max = 100);
        $harga = $barangItem->harga_beli; // get the harga attribute from the chosen Barang
        return [
            'jumlah' => $jumlah,
            'harga' => $harga,
            'subtotal' => $harga * $jumlah,
            'barang_id' => $barangItem->id,
            'pembelian_id' => $this->faker->randomElement($pembelian),
        ];
    }
}
