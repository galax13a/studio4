<?php

namespace App\View\Components;

use Illuminate\View\Component;

class headform extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title, $title_btn , $title_input;


    public function __construct($title="Null Title", $title_input="Busqueda X",$title_btn ="Crear Nuevo")
    {
        //
        $this->title = $title;
        $this->title_btn = $title_btn;
        $this->ttitle_input = $title_input;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.headform');
    }
}
