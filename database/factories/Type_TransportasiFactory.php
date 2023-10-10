<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\type_transportasi>
 */
class Type_TransportasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_type' => $this->faker->randomElement(['kereta_api', 'pesawat']),
            'keterangan' => $this->faker->sentence(),
        ];
    }
}
