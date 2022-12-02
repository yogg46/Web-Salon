<?php

namespace Database\Factories;

use App\Models\Suplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembelian>
 */
class PembelianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $petugasGudang = User::where('role', 'gudang')->pluck('id');
        $suplier = Suplier::pluck('id');

        return [
            'tanggal' =>  $this->faker->dateTimeBetween('now', '+1 years')->format('d-m-Y'),
            'total' => $this->faker->numberBetween($min = 20000, $max = 1000000),
            'petugas_gudang' => $this->faker->randomElement($petugasGudang),
            'suplier_id' => $this->faker->randomElement($suplier),
        ];
    }
}
