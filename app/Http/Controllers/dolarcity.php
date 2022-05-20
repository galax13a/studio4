<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dolar;

class dolarcity extends Controller
{
    //
    public $selected_id, $keyWord, $trm, $trm2, $date;

    public function index(){
      echo("llego api doalr");
    }

    public function __construct(Request $request)
    {
        $key='kasndjknsdf654sdf4sdf5sdf5s65x55df5hu5yui5u5i5ui5us5s52f26gh52ghjhg5j5hgj5hgjg33211xxfg44644535355f5g5b5v2v2v22d2d22dd2d2cxxzz7';
        if ($request->isMethod('post')){
            
            if($request->input("key")==$key){
                echo 'OK';
            }else{
                echo 'ERROR key';
                return false;
            }
            $trm = $request->input("dolar");
            $trm2 = $request->input("trm2");
            $date3 = $request->input("date3");
        
            date_default_timezone_set("America/Bogota");
            $this->fecha = date('Y-m-d'); //strftime("Hoy es %A y son las %H:%M");
           // return "DAtos CityDoalr";

          $row =  Dolar::Where("date", $date3)->get();

          if(!empty($row->count()<=0)){
            Dolar::create([ 
                'trm' => $trm,
                'trm2' => $trm2,
                'date' => $date3
            ]);
            echo 'Register save';

          } else  {
			$record = Dolar::find($row[0]['id']);
            $record->update([
                'trm2' => $trm2
            ]);
              echo ' Update row '.$trm2;
          }

        }
        
    }
}

