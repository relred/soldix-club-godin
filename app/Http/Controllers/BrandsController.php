<?php

namespace App\Http\Controllers;

use App\Models\Corporate;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = auth()->user()->corporate()->first()->brands()->get();

        return view('admin.brands', ['brands' => $brands]);
    }

    public function store(Request $request)
    {
        $corporate = auth()->user()->corporate;

        $brand = $corporate->brands()->create([
            'name' => $request->name, 
            'image' => '', 
        ]);

        $brand->wallet()->create([
            'corporate_id' => $corporate->first()->id,
        ]);

        return redirect()->route('corporate.brands')->with('status', 'Marca registrada con éxito');
    }
}
