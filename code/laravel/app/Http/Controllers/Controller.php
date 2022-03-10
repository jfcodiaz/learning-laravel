<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function helloWorld ($name, $edad, Request $request) {

        /*$producto = new Product();
        $producto->name = 'PS5';
        $producto->description = 'Consola de videojuegos';
        $producto->save();
*/
        /**
         * @var Product $ps5
         */
        $ps5 = Product::findOrFail(1);

        $ps5->name = 'PSP5 slim';
        $ps5->save();

        $ps5->delete();

        dd($ps5->name);

        //$objetoUtil = new Util();
        return view('hello', compact('edad', 'name'));

        return view('hello', [
            'name' => $name,
            'edad'=>  $edad
        ]);
    }
}
