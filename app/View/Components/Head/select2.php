<?php

namespace App\View\Components\Head;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class select2 extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.head.select2');
    }
}
