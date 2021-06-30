<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    public $name;
    public $masters;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $masters)
    {
        $this->name = $name;
        $this->masters = $masters;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
