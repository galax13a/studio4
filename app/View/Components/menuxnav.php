<?php

namespace App\View\Components;

use Illuminate\View\Component;

class menuxnav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $menu, $type_menu;
    public function __construct($menu= null, $type_menu=null)
    {
        //
        //dd($menu);
        $this->menu = $menu;
        $this->type_menu = $type_menu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menuxnav');
    }
}
