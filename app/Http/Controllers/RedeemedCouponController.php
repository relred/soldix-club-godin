<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\RedeemedCoupon;

class RedeemedCouponController extends Controller
{
    function view($coupon_id, $user_id) {
        $coupon = Coupon::where('redeem_id', $coupon_id)->first();
        return view('pos.coupon', ['coupon' => $coupon, 'coupon_id' => $coupon_id, 'user_id' => $user_id]);
    }

    function store(Request $request) {
        $coupon = Coupon::where('redeem_id', $request->coupon_id)->first();

        $redeemedCoupon = RedeemedCoupon::create([
            'user_id' => $request->user_id,
            'coupon_id' => $coupon->id,
            'cashier' => auth()->user()->id,
            'transaction_data' => 'POS',
        ]);

        return $redeemedCoupon;
        //return redirect()->route('pos.success');
    }

}
