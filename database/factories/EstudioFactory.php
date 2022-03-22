<?php

namespace Database\Factories;

use App\Models\Estudio;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EstudioFactory extends Factory
{
    protected $model = Estudio::class;

    public function definition()
    {
        return [
			'name' => $this->faker->randomElement(["Studios CL","Tipmodels","GRupo Be","Agata Estudio","Bluebunny","Pina up","sateletes","mosaico cams","cartagenas cams"]),
			'ciudad' => $this->faker->name,
			'dir' => $this->faker->name,
			'empresa_id' => Empresa::all()->random()->id,
        ];
    }
}
