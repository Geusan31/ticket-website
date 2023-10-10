<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\transportasi>
 */
class TransportasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode' => $this->faker->unique()->randomNumber(5),
            'jumlah_kursi' => $this->faker->numberBetween(30, 60),
            'keterangan' => $this->faker->sentence(),
            'id_type_transportasi' => mt_rand(1, 5),
        ];
    }
}
