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
			'name' => $this->faker->randomElement(["COP","USD","TKS"]),
			'code' => "USD",
			'datax' => null,
			'status' => 1
        ];
    }
}
