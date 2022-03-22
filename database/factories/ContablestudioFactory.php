<?php

namespace Database\Factories;

use App\Models\Contablestudio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContablestudioFactory extends Factory
{
    protected $model = Contablestudio::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'value' => $this->faker->name,
			'status' => $this->faker->name,
			'codesubmaster' => $this->faker->name,
			'datax' => $this->faker->name,
			'studio_id' => $this->faker->name,
			'contable_id' => $this->faker->name,
        ];
    }
}
