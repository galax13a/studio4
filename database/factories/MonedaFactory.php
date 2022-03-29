<?php

namespace Database\Factories;

use App\Models\Moneda;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MonedaFactory extends Factory
{
    protected $model = Moneda::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'code' => $this->faker->name,
			'datax' => $this->faker->name,
			'status' => $this->faker->name,
        ];
    }
}
