<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Requests\ProductRequest;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }

    public function index()
    {
        return ProductCollection::collection(Product::paginate(5));
    }

 
    public function create()
    {
        //
    }

  
    public function store(ProductRequest $request)
    {
      $product = new Product;
      $product->name = $request->name;
      $product->detail = $request->description;
      $product->price = $request->price;
      $product->stock = $request->stock;
      $product->discount = $request->discount;
      $product->save();
      return response([
        'data' => new ProductResource($product)
      ], Response::HTTP_CREATED); 

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
