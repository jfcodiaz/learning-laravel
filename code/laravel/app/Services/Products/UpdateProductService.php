<?php
namespace App\Services\Products;

use App\Models\Product;

class UpdateProductService
{

    public function __invoke(Product $product, string $name, string $description, array $categories): void
    {
        $product->name = $name;
        $product->description = $description;
        $product->categories()->sync($categories);
        $product->save();
    }

}
