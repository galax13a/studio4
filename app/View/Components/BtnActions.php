<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BtnActions extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id_row;

    public function __construct($id_row = null)
    {
        //
        $this->id_row = $id_row;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.btn-actions');
    }
}
