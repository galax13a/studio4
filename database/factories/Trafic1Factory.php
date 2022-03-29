<?php

namespace Database\Factories;

use App\Models\Trafic1;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class Trafic1Factory extends Factory
{
    protected $model = Trafic1::class;

    public function definition()
    {
        return [
			'url' => $this->faker->name,
			'pagui' => $this->faker->name,
			'datax' => $this->faker->name,
			'status' => $this->faker->name,
			'page_id' => $this->faker->name,
			'tiposala' => $this->faker->name,
        ];
    }
}
