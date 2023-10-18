<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $rutes = [1, 2, 3, 4, 5];

        if (empty($rutes)) {
            $rutes = [1, 2, 3, 4, 5];
        }

        $key = array_rand($rutes);
        $id = $rutes[$key];
        unset($rutes[$key]);

        return [
            'id_penumpang' => $id,
            'id_pemesanan' => $id,
            'total' => $this->faker->randomNumber(6),
        ];
    }
}
