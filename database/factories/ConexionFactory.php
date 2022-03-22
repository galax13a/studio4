<?php

namespace Database\Factories;

use App\Models\Conexion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Estudio;
use App\Models\Modelo;

class ConexionFactory extends Factory
{
    protected $model = Conexion::class;

    public function definition()
    {
        return [
			'date' => date('Y-m-d'),
			'time_page' => $this->faker->numerify('##'),
			'time_real' => $this->faker->numerify('##'),
			'time_min' =>  $this->faker->numerify('#'),
			'timebrb' => date('h:i:s'),
			'studio_id' => Estudio::all()->random()->id,
			'model_id' => Modelo::all()->random()->id,
        ];
    }
}
