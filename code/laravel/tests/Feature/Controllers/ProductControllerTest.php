<?php
namespace Tests\Feature\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Services\Products\CreateProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    private null|User $user = null;
    private null|Category $categoryA = null;
    private null|Category $categoryB = null;
    private string $productName = 'test Product';
    private string $description = 'test Description';
    private null|Product $product;

    public function setUp(): void
    {
        parent::setUp();
        if ($this->getName() === 'test_create_is_visible') {
            return;
        }

        $this->user = User::factory()->create();

        $this->categoryA = Category::factory()->create([
            'name' => 'Category A'
        ]);

        $this->categoryB = Category::factory()->create([
            'name' => 'Category B'
        ]);

        $this->actingAs($this->user);

        if ($this->getName() != 'test_store_new_product') {
            $this->createProduct();
        }
    }

    public function test_create_is_visible(): void
    {
        $url = route('products.create', [
            'len' => 'es'
        ]);
        $response = $this->get($url);
        $response->assertStatus(200);
    }

    public function test_store_new_product(): void
    {
        $url = route('products.store', [
            'len' => 'es'
        ]);

        $this->actingAs($this->user)->post($url, [
            'name' => 'product test',
            'description' => 'description test',
            'categories' => [
                $this->categoryA->id, $this->categoryB->id
            ]
        ]);

        $product = Product::query()->where('name', 'product test')->first();
        $this->assertNotNull($product);
        $this->assertSame($product->creator->name, $this->user->name);
    }

    public function test_update_product(): void
    {
        $expectedName = 'product edited';
        $expectedDescription = 'description edited';

        $url = route('products.update', [
            'len' => 'es',
            'product' => $this->product->id
        ]);

        $this->put($url, [
            'name' => $expectedName,
            'description' => $expectedDescription,
            'categories' => [
                $this->categoryA->id
            ]
        ]);

        /** @var Product $updatedProduct */
        $updatedProduct = Product::query()->find($this->product->id);
        $this->assertSame($expectedName, $updatedProduct->name);
        $this->assertSame($expectedDescription, $updatedProduct->description);
        $this->assertNull($updatedProduct->categories()->find($this->categoryB));
        $this->assertNotNull($updatedProduct->categories()->find($this->categoryA));
    }

    public function test_delete_product(): void
    {
        /** @var Product $producto */
        $product = Product::query()->find($this->product->id);
        $this->assertNotNull($product);
        $url = route('products.destroy', [
            'product' => $this->product->id,
            'len' => 'es'
        ]);

        $response = $this->delete($url);
        $product = Product::query()->find($this->product->id);
        $this->assertNull($product);
    }

    private function createProduct()
    {
        $createProductService = $this->app->make(CreateProductService::class);
        $this->product = $createProductService($this->productName, $this->description, [
            $this->categoryB->id
        ], $this->user);
        $this->assertNotNull($this->product->categories()->find($this->categoryB));
    }
}
