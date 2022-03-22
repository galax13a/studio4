<?php

namespace Database\Factories;

use App\Models\Paymedio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PaymedioFactory extends Factory
{
    protected $model = Paymedio::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'datax' => $this->faker->name,
			'studio_id' => $this->faker->name,
			'moneda_id' => $this->faker->name,
			'status' => $this->faker->name,
        ];
    }
}
