<?php

namespace Tests\Feature\Controllers\Category;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Services\Traits\CreateFakeCategory;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use CreateFakeCategory;
    use RefreshDatabase;

    public function test_update_category(): void
    {
        /** @var CategoryRepository $categoryRepository */
        $categoryRepository = $this->app->make(CategoryRepository::class);

        $category = $this->createFakeCategory();

        $expectedName = 'category Edited';

        $url = route('categories.update', [
            'len' => 'es',
            'category' => $category->id
        ]);

        $response = $this->put($url, [
            'name' => $expectedName
        ]);

        /** @var Category $categoryDb */
        $categoryDb = $categoryRepository->getById($category->id);
        $this->assertSame($expectedName, $categoryDb->name);
    }
}
