<?php

namespace Database\Seeders;

use App\Models\Cari;
use Illuminate\Database\Seeder;

class CariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cari::factory()
            ->count(5)
            ->create();
    }
}
