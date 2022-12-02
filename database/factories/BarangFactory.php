<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_barang' => $this->faker->company(),
            'harga_beli' => $this->faker->numberBetween($min = 2000, $max = 10000),
            'harga_jual' => $this->faker->numberBetween($min = 2500, $max = 15000),
            'stock' => $this->faker->numberBetween($min = 10, $max = 100),
        ];
    }
}
