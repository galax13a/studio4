<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(1)->create();
         \App\Models\Empresa::factory(5)->create();
         \App\Models\Moneda::factory(4)->create();
         \App\Models\Estudio::factory(6)->create();
         \App\Models\Pagemaster::factory(6)->create();
         \App\Models\Page::factory(6)->create();
         \App\models\Modelo::factory(11)->create();
         \App\Models\Conexion::factory(11)->create();
         \App\Models\Pagemodel::factory(6)->create();
         \App\Models\Paypage::factory(8)->create();
         \App\Models\Prize::factory(6)->create();
         \App\Models\Prizesdetail::factory(6)->create();
         \App\Models\Chaturdata::factory(3)->create();
         \App\Models\Statstudio::factory(3)->create();
         \App\Models\Monetizadore::factory(3)->create();
     

    }
}
