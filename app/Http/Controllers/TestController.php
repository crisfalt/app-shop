<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
    //
    public function welcome() {
        // $products = Product::all();
        // return view('welcome')->with(compact('products')); //compact sirve para crear un arreglo a partir de una variabl
        $products = Product::paginate(9); //para paginar los productos de 15 en 15
        return view('welcome')->with(compact('products')); //listado de productos
    }
}
