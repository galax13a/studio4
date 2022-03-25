<?php

namespace App\Http\Controllers;
require 'vendor/autoload.php';
use Illuminate\Http\Request;
use Luecano\NumeroALetras\NumeroALetras;

class testing extends Controller
{
    //

    public function index()
    {
        $formatter = new NumeroALetras();
        echo $formatter->toMoney(2500.90, 2, 'DÓLARES', 'CENTAVOS');
    }
}
