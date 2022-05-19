<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\Categories\CreateCategoryService;
use App\Services\Categories\DeleteCategoryService;
use App\Services\Categories\UpdateCategoryService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function store(Request $request, CreateCategoryService $createCategory)
    {
        $name = $request->get('name');
        $createCategory($name);

        return redirect(route('categories.index'));
    }

    public function update(Request $request, Category $category, UpdateCategoryService $updateCategory)
    {
        $updateCategory($category, [
           'name' => $request->get('name')
        ]);
        return redirect(route('categories.index'));
    }

    public function destroy(Category $category, DeleteCategoryService $deleteCategory)
    {
        $deleteCategory($category);
        return redirect(route('categories.index'));
    }
}
