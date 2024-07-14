<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Coupon;
use App\Models\RedeemedCoupon;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

class WalletsController extends Controller
{
    public function index()
    {
        $wallets = auth()->user()->corporate()->first()->wallets()->get();

        return view('admin.wallets.index', ['wallets' => $wallets]);
    }

    public function view($id)
    {
        $wallet = Wallet::findOrFail($id);
        $brand = $wallet->brand()->first();
        $coupons = $wallet->coupons()->get();

        return view('admin.wallets.view', ['wallet' => $wallet, 'coupons' => $coupons, 'brand' => $brand]);
    }

    public function store(Request $request, $id)
    {
        $brand = Brand::find($id);
        $image = $request->file->storeOnCloudinary('soldix-club/wallets');

        $brand->wallets()->create([
            'name' => $request->name,
            'image' => $image->getPath(),
            'corporate_id' => auth()->user()->corporate_id,
        ]);

        return redirect()->route('corporate.brands.view', $id)->with('status', 'Cuponera actualizada con éxito');
    }

    public function public_index()
    {
        $wallets = Wallet::where('is_public', True)->where('club', auth()->user()->club)->get();

        return view('user.wallets', ['wallets' => $wallets]);
    }

    public function public_view($id)
    {
         $wallet = Wallet::findOrFail($id);
        $coupons = $wallet->coupons()->where('is_active', 1)->get(); 

        $filteredCoupons = [];

        foreach ($coupons as $coupon) {
            if (!RedeemedCoupon::where('coupon_id', $coupon->id)->where('user_id', auth()->user()->id)->exists()) {
                $filteredCoupons[] = $coupon;
            }
        }

        return view('user.wallet.view', ['wallet' => $wallet, 'coupons' => $filteredCoupons]);
    }

    public function update(Request $request, $id)
    {
        $wallet = Wallet::findOrFail($id);

        if ($request->name) {
            $wallet->name = $request->name;
        }

        if ($request->file) {
            $image = $request->file->storeOnCloudinary('soldix-club/wallets');
            $wallet->image = $image->getPath();
        }

        if ($request->is_public) {
            $wallet->is_public = ($request->is_public == 'true') ? true : false;
        }

        if ($request->club) {
            $wallet->club = $request->club;
        }

        if ($request->name || $request->file || $request->is_public || $request->club) {
            $wallet->save();
        }

        return redirect()->route('corporate.wallets.view', $id)->with('status', 'Cuponera actualizada con éxito');
    }

    public function bulkEditDate(Request $request, $id)
    {
        $coupons = Wallet::findOrFail($id)->coupons()->get();

        foreach ($coupons as $coupon) {

            if ($request->campain_starts) {
                $coupon->campain_starts = $request->campain_starts;
            }

            if ($request->campain_finishes) {
                $coupon->campain_finishes = $request->campain_finishes;
            }
            $coupon->save();
        }

        return redirect()->route('corporate.wallets.view', $id)->with('status', 'Cuponera actualizada con éxito');
    }

    public function bulkEditDays(Request $request, $id)
    {
        $coupons = Wallet::findOrFail($id)->coupons()->get();

        $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        foreach ($coupons as $coupon) {
            foreach ($daysOfWeek as $day) {
                $requestKey = 'is_valid_' . $day;
                $coupon->$requestKey = $request->$requestKey ? 1 : 0;
            }
            $coupon->save();
        }

        return redirect()->route('corporate.wallets.view', $id)->with('status', 'Cuponera actualizada con éxito');
    }

    public function bulkEditPublic($id)
    {
        $coupons = Wallet::findOrFail($id)->coupons()->get();

        foreach ($coupons as $coupon) {
            if (CouponsController::isPublishable($coupon)) {
                $coupon->is_active = 1;
                $coupon->save();
            }
        }
        return redirect()->route('corporate.wallets.view', $id)->with('status', 'Cuponera actualizada con éxito');
    }

}
