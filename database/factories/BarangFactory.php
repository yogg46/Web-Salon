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
        $hargaMenu = $this->faker->numberBetween(10000, 150000);
        $hargaMenu = floor($hargaMenu / 5000) * 5000;
        $barangs = [  "L'Oreal Professionnel",
        "Schwarzkopf",
        "Wella Professionals",
        "Goldwell",
        "Kérastase",
        "Redken",
        "Matrix",
        "TIGI",
        "Joico",
        "Olaplex",
        "Moroccanoil",
        "Davines",
        "Kevin Murphy",
        "Paul Mitchell",
        "Nioxin",
        "Biolage",
        "Kiehl's",
        "Estée Lauder",
        "Shiseido",
        "Clinique",
        "The Body Shop",
        "Sephora",
        "Maybelline",
        "Revlon",
        "MAC Cosmetics",
        "Urban Decay",
        "Anastasia Beverly Hills",
        "Huda Beauty",
        "NYX Professional Makeup",
        "Too Faced",
        "Make Up For Ever",
        "Charlotte Tilbury",
        "Benefit Cosmetics",
        "NARS Cosmetics",
        "Laura Mercier",
        "Bobbi Brown",
        "Chanel",
        "Dior",
        "Gucci Beauty",
        "Yves Saint Laurent Beauty",
        "Giorgio Armani Beauty",
        "Tom Ford Beauty",
        "M.A.C Cosmetics",
        "Fenty Beauty"];

        return [
            'nama_barang' => $this->faker->randomElement($barangs),
            'harga_beli' => $hargaMenu,
            'harga_jual' => $hargaMenu,
            'stock' => $this->faker->numberBetween($min = 10, $max = 100),
        ];
    }
}
