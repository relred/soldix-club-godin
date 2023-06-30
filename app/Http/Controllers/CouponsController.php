<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Wallet;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function index()
    {
        return view('admin.coupons.index');
    }

    public function view($id)
    {
        $coupon = Coupon::find($id);
        
        return view('user.coupon', ['coupon' => $coupon]);
    }

    public function add()
    {
        return view('admin.coupons.add');
    }

    public function add_to_wallet($id)
    {
        return view('admin.coupons.add', ['id' => $id]);
    }

    public function store(Request $request, $id)
    {

        $wallet = Wallet::find($id);
        $wallet->coupons()->create([
            'name' => $request->name,
            'description' => '',
            'type' => $request->type,
            'tag' => $request->tag,
            'valid' => 1,
            'campain_starts' => '',
            'campain_ends' => '',
            'active' => 0,
            'parameters' => 0,
        ]);

        return redirect()->route('corporate.wallets.view', $id);
    }
}
