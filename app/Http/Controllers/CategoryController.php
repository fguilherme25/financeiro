<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('status', 1)
            ->orderBy('name')
            ->get();

        return \view('categories.index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //public function store(StoreCategoryRequest $request)
    public function store(CategoryRequest $request)
    {
        $request->validated();

        Category::create([
            'name' => $request->name,
        ]);

        return \redirect()
                    ->route('category.index')
                    ->with('success', 'Categoria cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return \view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return \view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
        ]);

        return \redirect()
                    ->route('category.index')
                    ->with('success', 'Categoria alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        return \view('categories.destroy', ['category' => $category]);
    }

    public function disable(Category $category)
    {
        $category->update([
            'status' => 0,
        ]);

        return \redirect()
                    ->route('category.index')
                    ->with('success', 'Categoria excluída com sucesso!');

    }
}
