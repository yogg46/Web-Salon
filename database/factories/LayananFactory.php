<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Layanan>
 */
class LayananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $kasir = User::where('role', 'kasir')->pluck('id');
        $tgl = fake()->dateTimeThisMonth($max = 'now','Asia/Jakarta');

        return [
            'tanggal' => $tgl,
            'total' => fake()->numberBetween(10000, 200000),
            'user_id' => fake()->randomElement($kasir),
            'created_at'=> $tgl,
        ];
    }
}
