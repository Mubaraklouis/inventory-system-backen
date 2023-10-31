<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return inertia(
            'admin/category/productsTable',
            [
                "categories" => $categories
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category,$id)
    {
        $products = Category::find($id)->products;
        $category->find($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
