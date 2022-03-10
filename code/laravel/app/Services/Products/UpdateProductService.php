<?php
namespace App\Services\Products;

use App\Models\Product;

class UpdateProductService {

    public function __invoke(Product $product, string $name, string $description): void
    {
        $product->name = $name;
        $product->description = $description;
        $product->save();
    }

}
