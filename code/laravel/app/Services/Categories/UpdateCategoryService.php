<?php
namespace App\Services\Categories;

use App\Models\Category;

class UpdateCategoryService
{
    public function __invoke(Category $category, array $attributes): void
    {
        $category->name = $attributes['name'];
        $category->save();
    }
}
