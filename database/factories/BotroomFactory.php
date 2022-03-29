<?php

namespace Database\Factories;

use App\Models\Botroom;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BotroomFactory extends Factory
{
    protected $model = Botroom::class;

    public function definition()
    {
        return [
			'url' => $this->faker->name,
			'datax' => $this->faker->name,
			'status' => $this->faker->name,
			'page_id' => $this->faker->name,
			'tiposala' => $this->faker->name,
        ];
    }
}
