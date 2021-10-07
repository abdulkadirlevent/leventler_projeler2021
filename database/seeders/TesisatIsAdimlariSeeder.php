<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TesisatIsAdimlari;

class TesisatIsAdimlariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TesisatIsAdimlari::factory()
            ->count(5)
            ->create();
    }
}
