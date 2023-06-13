<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CorporatesController extends Controller
{
    public function index(): View
    {
        $corporates = User::where('role_id', Role::IS_ADMIN)->get();

        return view('admin.index', ['corporates' => $corporates]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|max:20',
            'phone' => 'unique',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role_id' => Role::IS_CORPORATE,
        ]);

        return redirect()->route('admin.index')->with('status', 'Usuario registrado con éxito');
    }
}
