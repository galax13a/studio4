<?php

namespace Database\Factories;

use App\Models\Invoicepaystudio;
use App\Models\Estudio;
use App\Models\Contable;
use App\Models\Moneda;
use App\Models\Monetizadore;
use App\Models\Paystudio;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InvoicepaystudioFactory extends Factory
{
    protected $model = Invoicepaystudio::class;

    public function definition()
    {
        return [
			'name' => $this->faker->randomElement(["Pago de chatur","pago de mate", "pago de mfc", "pago de cam4","pago de camsoda","pago de jasmin","pago de livestrimg","pago de lolypop"]),
			'date' => date('Y-m-d'),
			'payout' => $this->faker->randomElement([500,120,450,900,1000,230,126,185,190,236]),
			'dolar_value' => $this->faker->randomElement([3700,3800,3850,3900,3760,3716,3860]),
			'dolar_oficial' => 3900,
			'dolar_pagado' => 3700,
			'iva' => $this->faker->randomElement([0,1.2,2.5,4.0,5.0,6.0,3.5]),
			'status' => 0,
			'img_studio' => null,
			'img_payment' => null,
			'datax' => null,
			'studio_id' => Estudio::all()->random()->id,
			'contable_id' => Contable::all()->random()->id,
			'moneda_id' => Moneda::all()->random()->id,
 			'monetizador_id' => Monetizadore::all()->random()->id,
			 'paystudio_id' => Paystudio::all()->random()->id,
			 'empresa_id' => Empresa::all()->random()->id
        ];
    }
}
