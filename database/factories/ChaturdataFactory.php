<?php

namespace Database\Factories;

use App\Models\Chaturdata;
use App\Models\Estudio;
use App\Models\Pagemaster;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ChaturdataFactory extends Factory
{
    protected $model = Chaturdata::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'link' => $this->faker->name,
			'type' => 0,
			'status' => 0,
			'studio_id' => Estudio::all()->random()->id,
			'pagemaster_id' =>Pagemaster::all()->random()->id,
        ];
    }
}
