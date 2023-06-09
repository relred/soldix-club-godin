<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RevenueProjection extends Component
{

    public $range = 1;
    public $users;
    public $type;
    public $revenue;
    public $ratios = ['go'=>105,'cuida'=>187,'merc'=>145];

    public function render()
    {
        if ($this->type) {
            $this->revenue = $this->users * $this->ratios[$this->type];
        }
        $this->users = $this->range * 100;
        return view('livewire.revenue-projection');
    }
    
    public function calculate()
    {
        $this->revenue = $this->users * $this->ratios[$this->type];
    }

}
