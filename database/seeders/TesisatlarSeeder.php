<?php

namespace Database\Seeders;

use App\Models\Tesisatlar;
use Illuminate\Database\Seeder;

class TesisatlarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tesisatlar::factory()
            ->count(5)
            ->create();
    }
}
