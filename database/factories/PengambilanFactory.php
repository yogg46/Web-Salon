<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengambilan>
 */
class PengambilanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::pluck('id');
        $barang = Barang::pluck('id');
        return [
            'tanggal' =>  $this->faker->dateTimeBetween('-1 years','now')->format('d-m-Y'),
            'jumlah' => $this->faker->numberBetween($min = 5, $max = 100),
            'user_id' => $this->faker->randomElement($user),
            'barang_id' => $this->faker->randomElement($barang),
        ];
    }
}