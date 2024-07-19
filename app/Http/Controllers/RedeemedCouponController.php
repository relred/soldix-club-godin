<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\RedeemedCoupon;
use App\Models\User;
use Illuminate\Support\Carbon;

class RedeemedCouponController extends Controller
{
    function view($coupon_id, $user_id){
        if ($this->isValid($user_id, $coupon_id)) {
            return redirect()->route('pos.error', [$coupon_id, $user_id]);    
        }
 
        $coupon = Coupon::where('redeem_id', $coupon_id)->first();
        return view('pos.coupon', ['coupon' => $coupon, 'coupon_id' => $coupon_id, 'user_id' => $user_id]);
    }

    function store(Request $request) : RedirectResponse {
        
        $coupon = Coupon::where('redeem_id', $request->coupon_id)->first();

        RedeemedCoupon::create([
            'user_id' => $request->user_id,
            'coupon_id' => $coupon->id,
            'cashier' => auth()->user()->id,
            'transaction_data' => 'POS',
        ]);

        return redirect()->route('pos.success');
    }

    function errorView($coupon_id, $user_id) : View {
        $message = $this->isValid($user_id, $coupon_id);
        return view('pos.error', ['message' => $message]);
    }

    function isValid($user_id, $coupon_id) {
        if (!User::find($user_id)) {
            return 'Este usuario no es válido';
        }
        if (! $coupon = Coupon::where('redeem_id', $coupon_id)->first()) {
            return 'Este cupon no existe en nuestros registros';
        }
        
        if (RedeemedCoupon::where('coupon_id', $coupon->id)->where('user_id', $user_id)->first()) {
            return 'Este cupon ya ha sido usado por el usuario';
        }

        if ($this->isNotValidToday($coupon)) {
            return 'Este cupon no es válido el día de hoy';
        }

        return false;
        
    }

    function isNotValidToday($coupon) {
        $attributeName = 'is_valid_' . strtolower(Carbon::now()->englishDayOfWeek);
    
        // Check if the attribute exists in the coupon model and if it's set to 1
        if (isset($coupon->$attributeName) && $coupon->$attributeName != 1) {
            return true;
        }
    
        return false; 
    }

}
