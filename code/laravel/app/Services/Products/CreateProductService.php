<?php
namespace App\Services\Products;

use App\Models\Product;

class CreateProductService
{
    public function __invoke($name, $description, $categories)
    {
        $product = new Product();
        $product->name = $name;
        $product->description = $description;
        $product->save();
        $product->categories()->sync($categories);
        return $product;
    }
}
