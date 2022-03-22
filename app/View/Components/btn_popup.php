<?php

namespace App\View\Components;

use Illuminate\View\Component;

class btn_popup extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title_btn,$mode;
    public function __construct($title_btn="Save",$mode=0)
    {
        //
       $this->title_btn = $title_btn;
       $this->mode = $mode;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.btn_popup');
    }
}
