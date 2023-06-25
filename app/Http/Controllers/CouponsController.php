<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
