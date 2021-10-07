<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\TesisatIsAdimlari;
use Illuminate\Database\Eloquent\Factories\Factory;

class TesisatIsAdimlariFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TesisatIsAdimlari::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'data_key' => $this->faker->randomNumber(0),
            'title' => $this->faker->sentence(10),
            'tahmin_zaman' => $this->faker->randomNumber(2),
            'gerceklesen_zaman' => $this->faker->randomNumber(2),
            'kayip_zaman' => $this->faker->randomNumber(2),
            'aciklama' => $this->faker->text,
            'ordering' => $this->faker->randomNumber(0),
            'state' => $this->faker->numberBetween(0, 127),
            'tesisatlar_id' => \App\Models\Tesisatlar::factory(),
        ];
    }
}
