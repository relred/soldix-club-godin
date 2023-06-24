<?php

namespace App\Http\Controllers;

use App\Models\Corporate;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CorporatesController extends Controller
{
    public function index()
    {
        $corporates = (auth()->user()->role_id == Role::IS_CORPORATE)
            ? auth()->user()->corporate->users()->get()
            : Corporate::all();

        return view('admin.corporates', ['corporates' => $corporates]);
    }

    public function store(Request $request)
    {
        $corporate = auth()->user()->corporate;
        $corporate->users()->create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_local_admin' => 0,
            'password' => Hash::make($request->password),
            'role_id' => Role::IS_CORPORATE,
        ]);

        return redirect()->route('corporate.index')->with('status', 'Usuario registrado con éxito');
    }

    public function store_local_admin(Request $request)
    {
        DB::beginTransaction();

        $corporate = new Corporate();
        $corporate->name = $request->corporate_name;
        $corporate->save();

        if ($corporate->users()->create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_local_admin' => 1,
            'password' => Hash::make($request->password),
            'role_id' => Role::IS_CORPORATE,
        ])
        ) {
            DB::commit();

            return redirect()->route('admin.corporate.index')->with('status', 'Corporativo registrado con éxito');
        } else {
            DB::rollBack();

            return redirect()->route('admin.corporate.index')->with('status', 'Error al registrar corporativo');
        }
    }

    public function destroy($id)
    {
        $corporate = User::find($id);
        $corporate->delete();

        return redirect()->route('admin.corporate.index')->with('status', 'Corporativo eliminado con éxito');
    }
}
