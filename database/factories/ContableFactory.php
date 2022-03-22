<?php

namespace Database\Factories;

use App\Models\Contable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContableFactory extends Factory
{
    protected $model = Contable::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'value' => $this->faker->name,
			'status' => $this->faker->name,
			'codemaster' => $this->faker->name,
			'datax' => $this->faker->name,
			'empresa_id' => $this->faker->name,
        ];
    }
}
