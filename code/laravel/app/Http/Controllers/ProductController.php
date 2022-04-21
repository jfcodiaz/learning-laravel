<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductRequests;
use App\Services\Products\CreateProductService;
use App\Services\Products\UpdateProductService;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('products.form',[
            'route' => route('products.store'),
            'title' => __('products/form.new-product'),
            'callAction' => __('products/form.create'),
            'product' => new Product(),
            'categories' => Category::all()
        ]);
    }

    public function store(ProductRequests $request, CreateProductService $createProductService)
    {
        $request->validated();

        $name = $request->post('name');
        $description = $request->post('description');
        $categories = $request->post('categories');
        $createProductService($name, $description, $categories);

        return redirect(route('products.index'));
    }

    public function show(Product $product) {
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product){
        return view('products.form',[
            'method' => 'PUT',
            'route' => route('products.update', ['product' => $product]),
            'title' => 'Edición de producto',
            'callAction' => 'Actualizar',
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    public function update(ProductRequests $request, Product $product, UpdateProductService $updateProductService) {

        $request->validated();
        $updateProductService(
            $product,
            $request->post('name'),
            $request->post('description'),
            $request->post('categories')
        );

        return redirect(route('products.index'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }
}
