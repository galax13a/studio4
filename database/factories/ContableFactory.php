<?php

namespace Database\Factories;

use App\Models\Contable;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContableFactory extends Factory
{
    protected $model = Contable::class;

    public function definition()
    {
        return [
			'name' => $this->faker->randomElement(["Activo","PAsivo","Patrimonio","Ingresos","Gastos","costos de ventas","Costos de produccion o operacion","Cuentas de orden deudoras","Cuenta de orden creadoras"]),
			'value' => 0,
			'status' => 1,
			'codemaster' => 1,
			'datax' => null,
			'empresa_id' => Empresa::all()->random()->id
        ];
    }
}
