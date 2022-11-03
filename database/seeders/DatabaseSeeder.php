<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            NiveisSeeder::class,
            StatusHistoricoSeeder::class,
            StatusSeeder::class,
            TipoAcoesSeeder::class,
            OrigemSeeder::class
        ]);
    }
}
