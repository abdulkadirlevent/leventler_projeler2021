<?php

namespace Database\Factories;

use App\Models\Projeler;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjelerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Projeler::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'proje_adi' => $this->faker->text(255),
            'sozlezme_no' => $this->faker->text(255),
            'baslama_tarihi' => $this->faker->dateTime,
            'teslim_tarihi' => $this->faker->dateTime,
            'birim_fiyati' => $this->faker->randomNumber(2),
            'cari_id' => \App\Models\Cari::factory(),
        ];
    }
}
