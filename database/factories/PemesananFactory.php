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

        return [
            'kode_pemesanan' => $this->faker->unique()->randomNumber(2),
            'tanggal_pemesanan' => $this->faker->date(),
            'id_pelanggan' => mt_rand(1, 5),
            'kode_kursi' => $this->faker->numberBetween(30, 60),
            'id_transportasi' => mt_rand(1, 5),
            'tujuan' => $rute->tujuan,
            'tanggal_berangkat' => $this->faker->date(),
            'jam_cekin' => $this->faker->dateTime(),
            'jam_berangkat' => $this->faker->dateTime(),
            'total_bayar' => $this->faker->randomNumber(4),
            'id_petugas' => mt_rand(1, 5),
        ];
    }
}
