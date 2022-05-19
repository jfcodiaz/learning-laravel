<?php

namespace Tests\Feature\Services;
use App\Services\Categories\UpdateCategoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Services\Traits\CreateFakeCategory;
use Tests\TestCase;

class UpdateCategoryTest extends TestCase
{
    use RefreshDatabase,
        CreateFakeCategory;

    public function test_invoke(): void
    {
        $expectedName = 'fake category';
        $category = $this->createFakeCategory($expectedName);
        $categoryBackup = clone $category;
        $this->assertEquals($categoryBackup->name, $category->name);
        ($this->app->make(UpdateCategoryService::class))($category, ['name' => 'Nuevo Nombre']);
        $this->assertNotEquals($categoryBackup->name, $category->name);
    }
}
