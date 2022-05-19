<?php
namespace Tests\Feature\Controllers\Category;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_category(): void
    {
        /** @var CategoryRepository $categoryRepository */
        $categoryRepository = $this->app->make(CategoryRepository::class);
        $expectedName = 'Category Test';
        $url = route('categories.store', [
            'len' => 'es'
        ]);
        $response = $this->post($url, [
            'name' => $expectedName
        ]);

        $category = $categoryRepository->getByName($expectedName);
        $this->assertSame(302, $response->getStatusCode());
        $this->assertNotNull($category);
        $this->assertIsInt($category->id);
    }

}
