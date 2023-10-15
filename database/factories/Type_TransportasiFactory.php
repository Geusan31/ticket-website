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
        $pesawat = [
            'Wings Air',
            'Lion Air',
            'Sriwijaya Air',
            'Garuda Indonesia',
            'NAM Air',
            'Citilink',
            'Batik Air',
            'PT.Trigana Air Service'
        ];

        $keretaApi = [
            'Kereta Api Jarak Jauh (KAJJ)',
            'Kereta Commuter Line (KRL)',
            'Kereta Bandara',
            'Kereta Mass Rapid Transit (MRT)',
            'Kereta Light Rail Transit (LRT)',
            'Kereta Cepat Jakarta - Bandung (KCJB)'
        ];

        if (rand(0, 1)) {
            $nama_type = "Pesawat";
            $keterangan = $this->faker->unique()->randomElement($pesawat);
        } else {
            $nama_type = "Kereta Api";
            $keterangan = $this->faker->unique()->randomElement($keretaApi);
        }

        return [
            'nama_type' => $nama_type,
            'keterangan' => $keterangan,
        ];
    }
}
