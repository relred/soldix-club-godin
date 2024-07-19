<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Coupon;
use Illuminate\Support\Carbon;

class RedeemedCoupon extends Component
{
    public $id;

    public $name;

    public $type;

    public $tag;

    public $image;
    
    public $date;

    public function __construct($id, $date)
    {
        $typeFormats = [
            'discount_percent' => '%s%%',
            'discount_fixed' => '$%s',
            'free' => '%s Gratis',
            '2x1' => '%s'
        ];

        $coupon = Coupon::find($id);

        $this->name = $coupon->name;
        $this->tag = $coupon->tag;
        $this->image = $coupon->image;
        $this->date = $date;
        $this->type = sprintf($typeFormats[$coupon->type] ?? '%s', $coupon->tag);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.redeemed-coupon');
    }
}
