<?php

namespace App\Http\Controllers;

use App\Models\Brand;
Use App\Models\Store;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StoresController extends Controller
{

    public function index()
    {
        $brands = auth()->user()->corporate()->first()->brands()->get();

        $stores = auth()->user()->corporate()->first()->stores()->get();

        return (isset($stores))
            ? view('admin.stores.index', ['stores' => $stores, 'brands' => $brands])
            : view('admin.stores.index', ['stores' => 0]);
    }

    public function store(Request $request)
    {
        $brand = Brand::find($request->brand);

        $store = $brand->stores()->create([
            'name' => $request->store,
            'corporate_id' => auth()->user()->corporate()->first()->id,
            'address' => $request->address,
        ]);

        $store->users()->create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->username . '@' . auth()->user()->corporate()->first()->username,
            'is_local_admin' => 1,
            'password' => Hash::make($request->password),
            'role_id' => Role::IS_CASHIER,
        ]);

        return redirect()->route('corporate.stores')->with('status', 'Marca registrada con éxito');

    }
}
