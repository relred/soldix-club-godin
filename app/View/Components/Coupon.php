<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Coupon extends Component
{

    public $image;
    public $type;
    public $tag;
    public $valid;

    /**
     * Create a new component instance.
     */
    public function __construct($image,$type,$tag,$valid)
    {
        $this->image = $image;
        $this->type = $type;
        $this->tag = $tag;
        $this->valid = $valid;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.coupon');
    }
}
