<?php
namespace App\Http\Controllers;
use App\Http\Requests\addTocartRequest;
use App\Http\Requests\createProductRequest;
use App\Http\Requests\removeCartRequest;
use App\Http\Requests\sellProductRequest;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Sale;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
            'admin/products/productCreate',
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
        $allProducts = Product::all();
        //display the default products with searching
        return inertia('admin/products/productIndex', [
            "products" => $products->paginate(4),
            "allProducts"=>$allProducts
        ]);
    }

    /**
     * Display a listing of the sold products.
     */
    public function sold()
    {
        return inertia('admin/products/productIndex', [
            "products" => Product::latest()->where('sold', '=', 1)->with(['category'])->paginate(4)
        ]);
    }

    /**
     * unsold()->Display a listing of the unsold products.
     */
    public function unsold()
    {
        return inertia('admin/products/productIndex', [
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
        return inertia('admin/products/productShow', [
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
    public function sell(sellProductRequest $request, Product $product)
    {


        $this->authorize('sell', $product);

        $user =Auth::user();

        //get the last price
        $last_sold = DB::select('SELECT * FROM sales
        WHERE created_at = (SELECT MAX(created_at) FROM sales);');

        //increment the price
       $total_price = $last_sold[0]->total_sales +$request['totalPrice'];


        //update the total sales

       $sale_price = [
           "total_sales"=>$total_price
       ];

       Sale::create($sale_price);





        return redirect()->route('dashboard');
    }

    /**
     * update the the cart column in the database to be true.
     */
    public function addToCart(addTocartRequest $request,Product $product,$id)
    {
        $validated = [
            "added_cart" => 1,
        ];
        DB::table('products')->where('id', $id)->update($validated);

       //show alert message here latter
    }
    /**
     * update the the cart column in the database to be true.
     */
    public function removeCart(removeCartRequest $request,Product $product,$id)
    {
        $validated = [
            "added_cart" => 0,
        ];
        DB::table('products')->where('id', $id)->update($validated);

        //show alert message here latter
    }

    /**
     * Edits the specified product in storage to be updated.
     */
    public function editProduct(Product $product, $id)
    {
        $product = $product->find($id);
        $categories = Category::all();
        return inertia('admin/products/productEdit', [
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
