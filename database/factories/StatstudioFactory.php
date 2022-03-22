<?php

namespace Database\Factories;

use App\Models\Statstudio;
use App\Models\Estudio;
use App\Models\Page;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StatstudioFactory extends Factory
{
    protected $model = Statstudio::class;

    public function definition()
    {
		return [
			'date' => date('Y-m-d'),
			'date_ini' => null,
			'date_finish' => null,
			'payout' => $this->faker->randomNumber(),
			'status' => 0,
			'program' => $this->faker->name,
			'studio_id' => Estudio::all()->random()->id,
			'page_id' => Page::all()->random()->id,
        ];
    }
}
