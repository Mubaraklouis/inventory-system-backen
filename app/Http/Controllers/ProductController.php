<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\User;

class ProductController extends Controller
{

 /**
     * Display a form for adding new product.
     */
    public function create()
    {

        return inertia('admin/in-products/inproductForm');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    // dd($products);

     return inertia('admin/in-products/inproductsTable',[
        "products"=> Product::paginate(4)
     ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
     $validated = [
    "name" =>$request->name,
    "user_id"=>$request->user_id,
    "serial_number" => $request->serial_number,
    "sold"=>$request->sold,
    "description"=>$request->description,
    "quantity"=>$request->price,
    "quantity" => $request->quantity,
    "price" =>$request->price
     ];

    Product::create($validated);
    return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product ,$id)
    {
     $product= $product->find($id);
     return inertia('admin/in-products/Product',[
        "product"=>$product
     ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

    }
}
