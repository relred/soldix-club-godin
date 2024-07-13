<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;


class ClientController extends Controller
{
    function index() : View {
        $clients = User::where('role_id', Role::IS_USER)->get();

        return view('admin.clients.index', ['clients' => $clients]);
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
            'role_id' => Role::IS_USER,
        ]);


        return redirect()->route('corporate.clients')->with('status','Usuario Registrado con éxito');
    }

    function accessByLink($email, $phone) : RedirectResponse {

        $user = User::where('email', $email)->first();

        if (!$user || $phone != $user->phone) {
            throw ValidationException::withMessages([
                'loginname' => trans('auth.failed'),
            ]);
        }

        Auth::login($user);

        return redirect()->route('dashboard');

    }
    
}
