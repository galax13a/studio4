<?php

namespace Database\Factories;

use App\Models\Paymediosdetail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PaymediosdetailFactory extends Factory
{
    protected $model = Paymediosdetail::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'status' => $this->faker->name,
			'studio_id' => $this->faker->name,
			'model_id' => $this->faker->name,
        ];
    }
}
