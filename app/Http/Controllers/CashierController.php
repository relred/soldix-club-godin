<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CashierController extends Controller
{
    function index() : View {
        $cashiers = User::where('role_id', Role::IS_CASHIER)->get();

        return view('admin.cashiers.index', ['cashiers' => $cashiers]);
    }

    function store(Request $request) : RedirectResponse {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'nullable', 
                Rule::unique('users', 'email'),
                Rule::requiredIf(function () use ($request) {
                    return empty($request->phone);
                }),
            ],
            'phone' => [
                'nullable',
                Rule::unique('users', 'phone'),
                Rule::requiredIf(function () use ($request) {
                    return empty($request->email);
                }),
                'max:255'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_local_admin' => 0,
            'role_id' => Role::IS_CASHIER,
        ]);


        return redirect()->route('corporate.cashiers')->with('status','Usuario Registrado con éxito');
    }

}
