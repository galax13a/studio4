<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\Estudio;
use App\Models\Pagemaster;
use App\Models\Moneda;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition()
    {
        return [
			'name' => Pagemaster::all()->random()->name,
			'monedax' => null,
			'value' => 60,
			'link' => $this->faker->url,
			'status' => 1,
			'studio_id' => Estudio::all()->random()->id,
			'pagemaster_id' => Pagemaster::all()->random()->id,
			'moneda_id' => Moneda::all()->random()->id
        ];
    }
}
