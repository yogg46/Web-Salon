<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jasa>
 */
class JasaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $kategori = Kategori::pluck('id');
        return [
            'nama_jasa' => fake()->jobTitle(),
            'harga' => 2000,
            'kategori_id' => fake()->randomElement($kategori),
        ];
    }
}