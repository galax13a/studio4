<?php

namespace Database\Factories;

use App\Models\Dolar;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DolarFactory extends Factory
{
    protected $model = Dolar::class;

    public function definition()
    {
        return [
			'trm' => $this->faker->name,
			'trm2' => $this->faker->name,
			'date' => $this->faker->name,
        ];
    }
}
