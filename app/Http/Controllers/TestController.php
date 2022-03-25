<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Luecano\NumeroALetras\NumeroALetras;

class TestController extends Controller
{
    //
    public function index(){
       // return 'llego a test';
       $formatter = new NumeroALetras();
       echo $formatter->toMoney(569, 0, 'usd', 0);

       echo '<br>';
       $formatter = new NumeroALetras();
      echo $formatter->toMoney(2500.90, 2, 'DÓLARES', 'CENTAVOS');
      echo '<br>';
      echo $formatter->toMoney(450076.0, 0, 'PESOS', 'CENTAVOS');
      echo '<br>';

      $formatter = new NumeroALetras();
echo $formatter->toMoney(10.10, 2, 'SOLES', 'CENTIMOS');
echo '<br>';
//DIEZ SOLES CON DIEZ CENTIMOS
$formatter = new NumeroALetras();
$formatter->conector = 'Y';
echo $formatter->toMoney(11.10, 2, 'pesos', 'centavos');
echo '<br>';
//ONCE PESOS Y DIEZ CENTAVOS
$formatter = new NumeroALetras();
echo $formatter->toInvoice(1700.50, 2, 'soles');
echo '<br>';
//MIL SETECIENTOS CON 50/100 SOLES
$formatter = new NumeroALetras();
echo $formatter->toString(5.2, 1, 'años', 'meses');




    }
}
