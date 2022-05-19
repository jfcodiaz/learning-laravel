<?php

namespace Tests\Feature\Services;

use Tests\TestCase;
use App\Models\Category;
use App\Services\Categories\CreateCategoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_invoke(): void
    {
        $expectedName = 'category test';
        $createCategory = $this->app->make(CreateCategoryService::class);
        $category = $createCategory('category test');
        $this->assertNotNull($category);
        $this->assertIsInt($category->id);
        $this->assertNotNull($category->id);
        $this->assertNotSame(0, $category->id);

        /** @var Category $categoryDb */
        $categoryDb = Category::query()->find($category->id);
        $this->assertSame($expectedName, $categoryDb->name);
    }
}
