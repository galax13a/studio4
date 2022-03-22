<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmpresaFactory extends Factory
{
    protected $model = Empresa::class;

    public function definition()
    {
        return [
			'name' => $this->faker->randomElement(["Empresa Master Studio SAS", "Grupo Bedoya","Juan Bustos","Aj Studios","Alba Estudios","LolyPop Studios SAS"]),
			'nit' => $this->faker->randomNumber(),
			'dir' => $this->faker->sentence(),
			'tel' => $this->faker->randomNumber(),
			'logo' => $this->faker->name,
			'email' => $this->faker->email,
			'wsp1' => $this->faker->randomNumber(),
			'pagina' => $this->faker->sentence(2).".com",
			'status' => 1,
			'users_id' =>1,
        ];
    }
}
