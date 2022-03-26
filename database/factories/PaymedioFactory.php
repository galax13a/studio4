<?php

namespace Database\Factories;

use App\Models\Paymedio;
use App\Models\Moneda;
use App\Models\Estudio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PaymedioFactory extends Factory
{
    protected $model = Paymedio::class;

    public function definition()
    {
        return [
			'name' => $this->faker->randomElement(["Bancolombia","Davivienda","NEqui","daviplata","masterpagos","BAnco de bogota","serviplata","BitoColombia"]),
			'datax' => null,
            'data1' => null,
            'data2' => null,
			'moneda_id' => Moneda::all()->random()->id,
			'status' => 1,
        ];
    }
}
