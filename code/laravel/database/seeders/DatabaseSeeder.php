<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
        ]);
        Product::factory(100)->create();

        $producto = new Product();
        $producto->name = 'PS5';
        $producto->description = 'Consola de videojuegos';
        $producto->save();
    }
}
