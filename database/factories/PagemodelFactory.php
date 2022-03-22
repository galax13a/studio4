<?php

namespace Database\Factories;

use App\Models\Pagemodel;
use \App\Models\Estudio;
use \App\Models\Moneda;
use \App\Models\Modelo;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PagemodelFactory extends Factory
{
    protected $model = Pagemodel::class;

    public function definition()
    {
        return [
			'nick' => $this->faker->name,
			'pass' => $this->faker->sentence(),
			'status' => 1,
			'galery' => null,
			'studio_id' => Estudio::all()->random()->id,
			'model_id' => Modelo::all()->random()->id,
			'moneda_id' =>Moneda::all()->random()->id
        ];
    }
}
