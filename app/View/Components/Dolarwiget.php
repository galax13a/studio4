<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Dolar;

class Dolarwiget extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title, $dolar, $dolar_to;

    
     public function __construct($title = "Dolar")
    {
        //
        $this->dolar = 3000;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        date_default_timezone_set("America/Bogota");
        $this->fecha = date('Y-m-d'); //strftime("Hoy es %A y son las %H:%M");
        $this->dolar = Dolar::where('date',$this->fecha )->get();
       // $record = Dolar::findOrFail($id);

        return view('components.dolarwiget');
    }
}
