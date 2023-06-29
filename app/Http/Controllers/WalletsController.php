<?php

namespace App\Http\Controllers;

class WalletsController extends Controller
{
    public function index()
    {
        $wallets = auth()->user()->corporate()->first()->wallets()->get();

        return view('admin.wallets', ['wallets' => $wallets]);
    }
}
