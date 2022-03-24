<?php

namespace Database\Factories;

use App\Models\Contablestudio;
use App\Models\Estudio;
use App\Models\Contable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContablestudioFactory extends Factory
{
    protected $model = Contablestudio::class;

    public function definition()
    {
        return [
			'name' => $this->faker->randomElement(["Gastos lavanderia","auxilio de transporte","don perez","ingresos operacionales","nomina","viaticos"]),
			'value' => 0,
			'status' => 1,
			'codesubmaster' => 0,
			'datax' => null,
			'studio_id' => Estudio::all()->random()->id,
			'contable_id' =>Contable::all()->random()->id,
        ];
    }
}
