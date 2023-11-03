<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return inertia(
            'admin/category/categoryTable',
            [
                "categories" => $categories
            ]
        );
    }

    /**
     * Display a listing of the resource.
     */
    public function create(){

        return inertia(
            'admin/category/categoryForm',

        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request ,Category $category)
    {
        $this->authorize('create',$category);
        Category::create($request->all());
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category,$id)
    {
        $products = Product::where('category_id','=',$id)->paginate(4);
        $category=$category->find($id);
        return inertia(
            'admin/category/productsTable',
            [
                "products" => $products,
                "category"=>$category
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->authorize('update',$category);
        DB::table('category')->where('id', $request->id)->update($request->all());
        return redirect()->route('category.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function editCategory( Category $category,$id)
    {
     $category = $category->find($id);
     $this->authorize('update',$category);
     return inertia('admin/category/updateCategoryForm',[
        "category"=>$category
     ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category,$id)
    {

        $category = $category->find($id);
        $this->authorize('delete',$category);
        $category->delete();

    }
}
