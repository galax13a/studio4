<?php

namespace Database\Factories;

use App\Models\Prize;
use App\Models\Estudio;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PrizeFactory extends Factory
{
    protected $model = Prize::class;

    public function definition()
    {
        return [
			'name' => $this->faker->randomElement(["Premio Conexion","La mejor en Toknes","Mejor Conexion del Dia","Rifa de un Secador","Regalamos 100 pesos"]),
			'description' => null,
			'date' => null,
			'date2' => null,
			'value' => 0,
			'status' => 1,
			'img' => null,
		    'studio_id' => Estudio::all()->random()->id
        ];
    }
}
