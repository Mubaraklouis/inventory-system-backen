<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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



        return inertia('admin/in-products/inproductsTable', [
            "products" => Product::latest()->with(['category'])->paginate(4)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = [
            "name" => $request->name,
            "user_id" => $request->user_id,
            "serial_number" => $request->serial_number,
            "sold" => $request->sold,
            "description" => $request->description,
            "quantity" => $request->price,
            "quantity" => $request->quantity,
            "price" => $request->price
        ];

        Product::create($validated);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, $id)
    {
        $product = $product->find($id);
        return inertia('admin/in-products/Product', [
            "product" => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {



        $validated = [
            "name" => $request->name,
            "user_id" => $request->user_id,
            "serial_number" => $request->serial_number,
            "sold" => $request->sold,
            "description" => $request->description,
            "quantity" => $request->price,
            "quantity" => $request->quantity,
            "price" => $request->price
        ];
        DB::table('products')->where('id',$request->id)->update($validated);

        return redirect()->route('products.index');
    }

    /**
     * Edits the specified product in storage to be updated.
     */
    public function editProduct(Product $product, $id)
    {
        $product = $product->find($id);
        return inertia('admin/in-products/update/Edit', [
            "product" => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product ,$id)
    {
      $product = $product->find($id);
      $product->delete();
    }
}
