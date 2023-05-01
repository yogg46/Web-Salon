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
        $waktu = fake()->dateTimeThisMonth($max = 'now','Asia/Jakarta');

        return [
            'tanggal' =>  $waktu,
            'total' => $this->faker->numberBetween($min = 20000, $max = 1000000),
            'petugas_gudang' => $this->faker->randomElement($petugasGudang),
            'suplier_id' => $this->faker->randomElement($suplier),
            'created_at'=>$waktu,
        ];
    }
}
