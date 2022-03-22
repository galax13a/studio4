<?php

namespace Database\Factories;

use App\Models\Paypage;
use App\Models\Estudio;
use App\Models\Modelo;
use App\Models\Moneda;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PaypageFactory extends Factory
{
    protected $model = Paypage::class;

    public function definition()
    {
        return [
			'date' => date('Y-m-d'),
			'value' => $this->faker->randomNumber(),
            'studio_id' => Estudio::all()->random()->id,
			'model_id' => Modelo::all()->random()->id,
			'moneda_id' =>Moneda::all()->random()->id
        ];
    }
}
