<?php

namespace Tests\Feature\Services;
use App\Models\Category;
use App\Services\Categories\DeleteCategoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Services\Traits\CreateFakeCategory;
use Tests\TestCase;


class DeleteCategoryTest extends TestCase
{
    use RefreshDatabase,
        CreateFakeCategory;

    public function test_invoke(): void
    {
        $expectedName = 'fake category';
        $category = $this->createFakeCategory($expectedName);
        $categoryDb = Category::query()->find($category->id);
        $this->assertNotNull($categoryDb);
        ($this->app->make(DeleteCategoryService::class))($category);
        $categoryDb = Category::query()->find($category->id);
        $this->assertNull($categoryDb);
    }
}
