<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create()
    {
        return view('test.product.create');
    }

    public function store(Request $request)
    {
        echo "<pre>";
        print_r($request->all());
        dd($request->all(), $request->file('images'));
        exit;

        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
        ]);

        $product = Product::create([
            'name' => $request->name,
        ]);

        $product
            ->addMedia($request->file('image'))
            ->toMediaCollection('gallery');

        return back()->with('success', 'Product created successfully.');
    }
}
