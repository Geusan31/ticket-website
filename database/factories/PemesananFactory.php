<?php

namespace Database\Factories;

use App\Models\Rute;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pemesanan>
 */
class PemesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $rute = Rute::factory()->create();

        $city = $this->faker->city();

        static $rutes = [1, 2, 3, 4 ,5];

        if(empty($rutes)) {
            $rutes = [1, 2, 3, 4, 5];
        }

        $key = array_rand($rutes);
        $id = $rutes[$key];
        unset($rutes[$key]);

        return [
            'kode_pemesanan' => $this->faker->unique()->randomNumber(2),
            'tanggal_pemesanan' => $this->faker->date(),
            'id_pelanggan' => $id,
            'kode_kursi' => $id,
            'id_transportasi' => $id,
            'tujuan' => $rute->tujuan,
            'tanggal_berangkat' => $this->faker->date(),
            'jam_cekin' => $this->faker->dateTime(),
            'jam_berangkat' => $this->faker->dateTime(),
            'total_bayar' => $this->faker->randomNumber(4),
            'id_petugas' => $id,
        ];
    }
}
