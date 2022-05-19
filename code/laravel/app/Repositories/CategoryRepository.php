<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getById(int $id): ?Category {
        return Category::query()->find($id);
    }
    public function getByName(string $name): ?Category
    {
        return Category::query()->where('name', $name)->first();
    }
}
