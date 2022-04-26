<?php
namespace Tests\Feature\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

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
        $user = User::factory()->create();

        $categoryA = Category::factory()->create([
            'name' => 'Categoria A'
        ]);

        $categoryB = Category::factory()->create([
            'name' => 'Categoria B'
        ]);

        $url = route('products.store', [
            'len' => 'es'
        ]);


        $this->actingAs($user)->post($url, [
            'name' => 'product test',
            'description' => 'description test',
            'categories' => [
                $categoryA->id, $categoryB->id
            ]
        ]);

        $product = Product::query()->where('name', 'product test')->first();
        $this->assertNotNull($product);
        $this->assertSame($product->creator->name, $user->name);
    }
}
