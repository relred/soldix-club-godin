<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Wallet;
use App\Models\Role;
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

        return (auth()->user()->role_id == Role::IS_USER)
                    ? view('user.coupon', ['coupon' => $coupon])
                    : view('user.coupon', ['coupon' => $coupon]);
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
//            'validity' => ,
            'campain_starts' => '',
            'campain_ends' => '',
            'is_active' => 0,
            'parameters' => 0,
        ]);

        return redirect()->route('corporate.wallets.view', $id);
    }

    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupons.edit', ['coupon' => $coupon]);
    }

    public function update(Request $request)
    {
        return $request;
    }

}
