<?php

namespace App\Http\Controllers;

use App\Models\Role;

class DashboardController extends Controller
{
    public function redirect()
    {
        if (auth()->user()->role_id == Role::IS_USER) {
            return redirect()->route('wallet');
        }

        if (auth()->user()->role_id == Role::IS_ADMIN) {
            return redirect()->route('admin.index');
        }

        if (auth()->user()->role_id == Role::IS_CORPORATE) {
            return redirect()->route('corporate.index');
        }

        return redirect()->route('wallet');
    }
}
