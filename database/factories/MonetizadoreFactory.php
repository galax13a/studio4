<?php

namespace Database\Factories;

use App\Models\Monetizadore;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MonetizadoreFactory extends Factory
{
    protected $model = Monetizadore::class;

    public function definition()
    {
        return [
			'name' => $this->faker->randomElement(["G7","OkiCenter","The WebcamLab","Bantokens","MiniPagos","JuiceService"]),
			'pagina' => "none.com",
			'contact' => $this->faker->name,
			'email' => $this->faker->email(),
			'porce' => $this->faker->randomElement([5,3,4,2.5]),
			'status' => 0,
			'datax' => '["{data:7892, phone:5522455, page:www.googles.com}"]'
        ];
    }
}
