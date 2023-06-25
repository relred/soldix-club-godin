<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Coupon extends Component
{
    public $id;

    public $image;

    public $type;

    public $tag;

    public $valid;

    /**
     * Create a new component instance.
     */
    public function __construct($id ,$image, $type, $tag, $valid)
    {
        $this->id = ($id) ?:'corporate';
        $this->image = $image;
        $this->type = $type;

        if ($this->type == 'free') {
            $this->tag = $tag ?:'Hamburguesa';
        }else if ($this->type == '2x1') {
            $this->tag = $tag ?:'2x1';
        }else{
            $this->tag = $tag ?:'10';
        }

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
