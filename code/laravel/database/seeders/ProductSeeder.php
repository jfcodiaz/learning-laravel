<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        $admins = User::role('administrator')->get();
        Product::factory(100)->create()->each(
            function(Product $product)  use ($categories, $admins) {
                $product->categories()->attach(
                    $categories->random(
                            rand(1, $categories->count()
                        )
                    )
                );
                $product->creator()->associate($admins->random());
                $product->save();
            }
        );

        $producto = new Product();
        $producto->name = 'PS5';
        $producto->description = 'Consola de videojuegos';
        $producto->save();
    }
}
