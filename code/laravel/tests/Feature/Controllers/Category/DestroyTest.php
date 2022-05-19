<?php

namespace Tests\Feature\Controllers\Category;

use Tests\Feature\Services\Traits\CreateFakeCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\CategoryRepository;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    use CreateFakeCategory;
    use RefreshDatabase;

    public function test_destroy_category(): void
    {
        $category = $this->createFakeCategory();
        /** @var CategoryRepository $categoryRepository */
        $categoryRepository = $this->app->make(CategoryRepository::class);

        $url = route('categories.destroy', [
            'len' => 'es',
            'category' => $category->id
        ]);

        $response = $this->delete($url);

        $categoryDb = $categoryRepository->getById($category->id);
        $this->assertNull($categoryDb);
        $this->assertSame(302, $response->getStatusCode());
    }
}
