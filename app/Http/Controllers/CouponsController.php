<?php

namespace App\Http\Controllers;

class CouponsController extends Controller
{
    public function index()
    {
        return view('admin.coupons.index');
    }

    public function add()
    {
        return view('admin.coupons.add');
    }
}
