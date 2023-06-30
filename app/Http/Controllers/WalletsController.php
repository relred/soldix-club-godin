<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
        $coupons = $wallet->coupons()->get();

        return view('admin.wallets.view', ['wallet' => $wallet, 'coupons' => $coupons]);
    }

    public function public_index()
    {
        $wallets = Wallet::all();

        return view('user.wallets', ['wallets' => $wallets]);
    }

    public function public_view($id)
    {
        $wallet = Wallet::findOrFail($id);
        $coupons = $wallet->coupons()->get();

        return view('user.wallet.view', ['wallet' => $wallet, 'coupons' => $coupons]);
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

        if ($request->name || $request->file) {
            $wallet->save();
        }

        return redirect()->route('corporate.wallets.view', $id)->with('status', 'Cuponera actualizada con éxito');
    }

}
