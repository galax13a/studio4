<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Trafic1;

class cbroom1 extends Controller
{
    //

    public $rowsdata, $url;

    public function index(){
      echo("Api CB Generate Table DB v1.0");
    }


    public function __construct(Request $request)
    {
        $key='GALAX26kasndjknsdf654sdf4s211xxfg44uiojb82522xzz7';
        $this->url = 'https://api.cam4studio.com/chaturbate-exhibitionist-cams';

        Trafic1::truncate();
      //  $visitors ->truncate();


        if ($request->isMethod('post')){
            
            if($request->input("key")==$key){
            
                $responde =  Http::get($this->url);
                $jsonData = $responde->json();
                $this->rowsdata = $jsonData[0]['urls'];

               foreach ($this->rowsdata as $row) { //

                Trafic1::create([ 
                    'url' => $row,
                    'pagui' => 'Chaturbate.com',
                    'status' => 1,
                    'page_id' => 1,
                    'tiposala' => 'chaturbate-exhibitionist-cams'
                ]);
               // echo 'Register save';
            }
                echo 'full records!';
            }else{
                echo 'ERROR key';
                return false;
            }
            //$rowsdata = $request->input("rowsdata");

        }
    }
}
