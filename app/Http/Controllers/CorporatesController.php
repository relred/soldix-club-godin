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
        $corporates = User::where('role_id', Role::IS_CASHIER)->get();

        return view('admin.index-corporates', ['corporates' => $corporates]);
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

        return redirect()->route('admin.corporate.index')->with('status', 'Cajero registrado con éxito');
    }

    public function destroy($id)
    {
        $corporate = User::find($id);
        $corporate->delete();

        return redirect()->route('admin.corporate.index')->with('status', 'Cajero eliminado con éxito');
    }
}
