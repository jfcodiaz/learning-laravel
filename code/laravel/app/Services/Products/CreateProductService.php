<?php
namespace App\Services\Products;

use App\Models\Product;
use App\Models\User;

class CreateProductService
{
    public function __invoke(
        string $name,
        string $description,
        array $categories,
        User $user
    ): Product {
        $product = new Product();
        $product->name = $name;
        $product->description = $description;
        $product->creator()->associate($user);
        $product->save();
        $product->categories()->sync($categories);

        return $product;
    }
}
