<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rute>
 */
class RuteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $city = $this->faker->city();

        return [
            'tujuan' => $city,
            'rute_awal' => $this->faker->city(),
            'rute_akhir' => $city,
            'harga' => $this->faker->randomNumber(6),
            'id_transportasi' => mt_rand(1, 5),
        ];
    }
}
