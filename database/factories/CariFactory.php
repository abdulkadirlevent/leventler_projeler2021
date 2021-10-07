<?php

namespace Database\Factories;

use App\Models\Cari;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CariFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cari::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ticari_unvani' => $this->faker->text(255),
            'cari_kodu' => $this->faker->text(255),
            'adi' => $this->faker->text(255),
            'soyadi' => $this->faker->text(255),
            'vergi_dairesi' => $this->faker->text(255),
            'vergi_no' => $this->faker->randomNumber(0),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
