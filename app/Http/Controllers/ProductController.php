<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate as FacadesGate;

class ProductController extends Controller
{

    /**
     * Display a form for adding new product.
     */
    public function create()
    {

        $categories = Category::all();

        return inertia(
            'admin/products/productForm',
            [
                "categories" => $categories
            ]
        );
    }


    /**
     * Display a listing of the sold products.
     */
    public function index()
    {



        return inertia('admin/products/productsTable', [
            "products" => Product::latest()->with(['category'])->paginate(4)
        ]);
    }

    /**
     * Display a listing of the sold products.
     */
    public function sold()
    {



        return inertia('admin/products/productsTable', [
            "products" => Product::latest()->where('sold', '=', 1)->with(['category'])->paginate(4)
        ]);
    }

    /**
     * Display a listing of the sold products.
     */
    public function unsold()
    {



        return inertia('admin/products/productsTable', [
            "products" => Product::latest()->where('sold', '=', 0)->with(['category'])->paginate(4)
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
            "category_id" => $request->category_id,
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
        $categories = Category::all();
        return inertia('admin/products/Product', [
            "product" => $product,
            "categories" => $categories
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
            "category_id" => $request->category_id,
            "serial_number" => $request->serial_number,
            "sold" => $request->sold,
            "description" => $request->description,
            "quantity" => $request->price,
            "quantity" => $request->quantity,
            "price" => $request->price
        ];
        DB::table('products')->where('id', $request->id)->update($validated);

        return redirect()->route('products.index');
    }



        /**
     * Update the specified sell in storage.
     */
    public function sell(UpdateProductRequest $request, Product $product ,$id)
    {

        $validated = [
            "sold" =>1,
        ];

        if (!FacadesGate::any(['can-sell','can-delete-product'], $product)) {
            abort(403);
        }

        DB::table('products')->where('id', $id)->update($validated);

        return redirect()->route('products.index');
    }

    /**
     * Edits the specified product in storage to be updated.
     */
    public function editProduct(Product $product, $id)
    {
        $product = $product->find($id);
        $categories = Category::all();
        return inertia('admin/products/update/Edit', [
            "product" => $product,
            "categories" => $categories
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {

        if (!FacadesGate::allows('can-delete-product', $product)) {
            abort(403);
        }
        $product = $product->find($id);
        $product->delete();
    }
}
