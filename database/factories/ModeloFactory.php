<?php

namespace Database\Factories;

use App\Models\Modelo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Estudio;
class ModeloFactory extends Factory
{
    protected $model = Modelo::class;

    public function definition()
    {
       
        return [
			'name' => $this->faker->name,
			'nick' => $this->faker->name,
			'email' => $this->faker->email,
			'dni' => $this->faker->name,
			'wsp' => $this->faker->name,
			'porce' => 50,
			'typomodel' => $this->faker->name,
			'img1' => null,
			'img2' => null,
			'img3' => null,
			'status' => 1,
			'studio_id' => Estudio::all()->random()->id,
        ];
    }
}
