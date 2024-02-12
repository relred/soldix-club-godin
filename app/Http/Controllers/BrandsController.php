<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = auth()->user()->corporate()->first()->brands()->get();

        return view('admin.brands.index', ['brands' => $brands]);
    }

    public function store(Request $request)
    {
        $corporate = auth()->user()->corporate;

        if ($request->file) {
            $image = $request->file->storeOnCloudinary('soldix-club/brands');
            $image = $image->getPath();
        }else{
            $image = '';
        }

        $brand = $corporate->brands()->create([
            'name' => $request->name, 
            'long_id' => sprintf("%u", crc32(uniqid())), 
            'image' => $image, 
        ]);

        $brand->wallet()->create([
            'corporate_id' => auth()->user()->corporate()->first()->id,
            'image' => $image,
        ]);

        return redirect()->route('corporate.brands')->with('status', 'Marca registrada con éxito');
    }
}
