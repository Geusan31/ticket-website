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
        static $rutes = [1, 2, 3, 4 ,5];

        if(empty($rutes)) {
            $rutes = [1, 2, 3, 4, 5];
        }

        $key = array_rand($rutes);
        $rute = $rutes[$key];
        unset($rutes[$key]);

        return [
            'kode' => $this->faker->unique()->randomNumber(5),
            'jumlah_kursi' => $this->faker->numberBetween(30, 60),
            'id_rute' => $rute,
            'id_type_transportasi' => $rute,
        ];
    }
}
