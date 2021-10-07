<?php

namespace Database\Seeders;

use App\Models\Projeler;
use Illuminate\Database\Seeder;

class ProjelerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Projeler::factory()
            ->count(5)
            ->create();
    }
}
