<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Corporate;

class CorporatesController extends Controller
{
    public function index()
    {
        $corporates = Corporate::all();

        return view('admin.index-corporates', ['corporates' => $corporates]);
    }

    public function store(Request $request)
    {
        
        $corporate = new Corporate(); 
        $corporate->name = $request->corporate_name;
        $corporate->save();

        $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|max:20',
            'phone' => 'unique',
        ]);
        
        $corporate->users()->create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_local_admin' => 1,
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
