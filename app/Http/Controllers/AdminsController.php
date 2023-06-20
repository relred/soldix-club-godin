<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminsController extends Controller
{
    public function index(): View
    {
        $admins = User::where('role_id', Role::IS_ADMIN)->get();

        return view('admin.index-admins', ['admins' => $admins]);
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
            'role_id' => Role::IS_ADMIN,
            'is_local_admin' => (isset($request->is_local_admin) && auth()->user()->is_local_admin) 
                                    ? $request->is_local_admin
                                    : 0,
        ]);

        return redirect()->route('admin.index')->with('status', 'Usuario registrado con éxito');
    }
    
    public function destroy($id)
    {
        $admin = User::find($id);

        (auth()->user()->is_local_admin) 
            ? $admin->delete()
            : redirect()->route('admin.index');

        return redirect()->route('admin.index')->with('status', 'Usuario eliminado con éxito');
    }
}
