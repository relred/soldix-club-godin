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

        return view('admin.wallets.view', ['wallet' => $wallet]);
    }

    public function update(Request $request, $id)
    {
        $wallet = Wallet::findOrFail($id);

        if ($request->name) {
            $wallet->name = $request->name;
        }

        if ($request->file) {
            $image = $request->file->storeOnCloudinary('soldix-club');
            $wallet->image = $image->getPath();
        }

        if ($request->name || $request->file) {
            $wallet->save();
        }

        return redirect()->route('corporate.wallets.view', $id)->with('status', 'Cuponera actualizada con éxito');
    }

}
