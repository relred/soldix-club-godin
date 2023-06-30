<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WalletCard extends Component
{
    public $name;
    public $image;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $image)
    {
        $this->name = $name;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.wallet-card');
    }
}
