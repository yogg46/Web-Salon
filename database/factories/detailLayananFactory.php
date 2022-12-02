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
        return [
            'jumlah' => fake()->numberBetween(2, 100),
            'harga' => fake()->numberBetween(1000, 20000),
            'subtotal' => fake()->numberBetween(2000, 200000),
            'layanan_id' => fake()->randomElement($layanan),
            'jasa_id' => fake()->randomElement($jasa),
        ];
    }
}