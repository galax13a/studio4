<?php

namespace Database\Factories;

use App\Models\Prizesdetail;
use App\Models\Estudio;
use App\Models\Modelo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PrizesdetailFactory extends Factory
{
    protected $model = Prizesdetail::class;

    public function definition()
    {
        return [
			'nota' => $this->faker->name,
			'date' =>date("Y-m-d"),
            'studio_id' => Estudio::all()->random()->id,
			'model_id' => Modelo::all()->random()->id,
        ];
    }
}
