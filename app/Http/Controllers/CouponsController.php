<?php

namespace App\Http\Controllers;

class CouponsController extends Controller
{
    public function index()
    {
        return view('admin.coupons');
    }

    public function new()
    {
        return view('admin.new-coupon');
    }
}
