<?php
namespace App\Services\Products;

use App\Models\Product;

class CreateProductService
{
    public function __invoke($name, $description)
    {
        $product = new Product();
        $product->name = $name;
        $product->description = $description;
        $product->save();

        return $product;
    }
}
