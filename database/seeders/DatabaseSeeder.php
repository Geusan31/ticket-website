<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Level;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\Penumpang;
use App\Models\Petugas;
use App\Models\Transportasi;
use App\Models\Type_transportasi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Level::factory(2)->create();

        Petugas::factory(5)->create();

        Penumpang::factory(5)->create();

        Pemesanan::factory(5)->create();

        Pembayaran::factory(5)->create();
        
        Transportasi::factory(5)->create();

        Type_transportasi::factory(5)->create();
    }
}
