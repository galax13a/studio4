<?php

namespace Database\Factories;

use App\Models\Paymediosdetail;
use App\Models\Modelo;
use App\Models\Estudio;
use App\Models\Paymedio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PaymediosdetailFactory extends Factory
{
    protected $model = Paymediosdetail::class;

    public function definition()
    {
        return [
			'name' => Paymedio::all()->random()->name,
			'status' => 1,
            'account' => 1099990,
			'studio_id' => Estudio::all()->random()->id,
			'model_id' => Modelo::all()->random()->id,
            'paymedio_id' =>Paymedio::all()->random()->id

        ];

        
    }
}
