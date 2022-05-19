<?php

namespace App\Services\Categories;

use App\Models\Category;

class DeleteCategoryService
{
    public function __invoke(Category $category): void
    {
        $category->delete();
    }
}
