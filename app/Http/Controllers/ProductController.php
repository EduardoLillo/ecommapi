<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product\ProductResource;


class ProductController extends Controller
{

    public function index()
    {
        return Product::all();
    }

 
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
    }

   
    public function show(Product $product)
    {
       return new ProductResource($product);
    }

   
    public function edit(Product $product)
    {
        //
    }

   
    public function update(Request $request, Product $product)
    {
        //
    }

   
    public function destroy(Product $product)
    {
        //
    }
}
