<?php

namespace Database\Factories;

use App\Models\Tesisatlar;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TesisatlarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tesisatlar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tesisat_no' => $this->faker->text(255),
            'baslama_tarihi' => $this->faker->dateTime,
            'teslim_tarihi' => $this->faker->dateTime,
            'birim_fiyati' => $this->faker->randomNumber(2),
            'projeler_id' => \App\Models\Projeler::factory(),
        ];
    }
}
