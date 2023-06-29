<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCoupon extends Component
{
    public $title;

    public $type = 'discount_fixed';

    public $tag;

    public $first2x1 = 2;

    public $second2x1 = 1;

    public function render()
    {
        if ($this->type == '2x1') {
            $this->tag = $this->first2x1.'x'.$this->second2x1;
        }

        return view('livewire.add-coupon');
    }

    public function unset_tag()
    {
        unset($this->tag);
    }
}
