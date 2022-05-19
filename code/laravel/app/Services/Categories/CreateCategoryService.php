<?php
namespace App\Services\Categories;

use App\Models\Category;

class CreateCategoryService
{
    public function __invoke(string $name): Category
    {
        $category = new Category();
        $category->name = $name;
        $category->save();
        return $category;
    }
}
