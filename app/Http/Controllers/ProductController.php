<?php
namespace App\Http\Controllers;
use App\Http\Requests\createProductRequest;
use App\Http\Requests\sellProductRequest;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate as FacadesGate;

class ProductController extends Controller
{
    /**
     * Display a form for adding new product.
     * $category : return all the list of the category to allow user add
     *  -> add category to a product
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
     * filter() : this is a function that searches for a
     * product in the database
     */

    public function index(createProductRequest $request)
    {
        //get all the products with the categories relationship
        $products = Product::latest()->with(['category'])->filter();
        //display the default products with searching
        return inertia('admin/products/productsTable', [
            "products" => $products->paginate(4)
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
     * unsold()->Display a listing of the unsold products.
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
    public function store(StoreProductRequest $request, Product $product)
    {

        //validate the product before storing it
        $validated = $request->validated();
        //authorision only admins can add product
        $this->authorize('create', $product);
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
     * @throws AuthorizationException
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        //validate the product before saving it in the database
        $validated = $request->validated();
        //authorization=> only admin users can update the product
        $this->authorize('update', $product);
        //update the product
        DB::table('products')->where('id', $request->id)->update($validated);
        //redirect the user to all the products page
        return redirect()->route('products.index');
    }


    /**
     * sell()->sets the sold column true(1).
     * @throws AuthorizationException
     */
    public function sell(sellProductRequest $request, Product $product, $id)
    {

        $validated = [
            "sold" => 1,
        ];

        $this->authorize('sell', $product);
        DB::table('products')->where('id', $id)->update($validated);
        // update the total sale column in the database by incrementing the sale property
        $user =Auth::user();
        //get the price columns
        $price = $product->find($id)->price;
        $saleInfo=[
            "total_sale" =>$user->total_sale+=$price
        ];

        DB::table('users')->where('id', $user->id)->update($saleInfo);

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


        $this->authorize('delete', $product);
        $product = $product->find($id);
        $product->delete();
    }
}
