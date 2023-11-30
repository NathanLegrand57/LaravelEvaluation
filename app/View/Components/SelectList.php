<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectList extends Component
{
    /**
     * Create a new component instance.
     */
    public $property;
    // public $label;
    public function __construct($property)
    {
        $this-> property = $property;
        // $this-> label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-list');
    }
}
