<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
//use App\Category;

class ProductController extends Controller
{
    //
    public function index() {
        $products = Product::paginate(10); //para paginar los productos de 15 en 15
        return view('admin.products.index')->with(compact('products')); //listado de productos
    }


    public function create() {
//        $categories = Category::all(); //traer categorias
        return view('admin.products.create'); //formulario de registro
    }

    public function store( Request $request ) {
        //dd($request->all());//el metodo permite imprimir todos los datos del request
        // return view(); //almacenar el registro de un producto
        //validar datos con reglas de laravel en documentacion hay mas
        //mensajes personalizados para cada campo
        $messages = [
            'name.required' => 'El nombre es un campo obligatorio',
            'name.min' => 'El nombre debe tener minimo 3 caracteres',
            'description.required' => 'La descripción es un campo obligatorio',
            'description.max' => 'La descripcion debe tener maximo 200 caracteres',
            'price.required' => 'El precio es un campo obligatorio',
            'price.numeric' => 'El precio es un campo de solo numeros',
            'price.min' => 'El precio no debe ser menor de cero'
        ];
        $rules = [
                'name' => 'required|min:3',
                'description' => 'required|max:200',
                'price' => 'required|numeric|min:0'
        ];
        $this->validate($request,$rules,$messages);
        //crear un prodcuto nuevo
        $product = new Product();
        $product -> name = $request->input('name');
        $product -> description = $request->input('description');
        $product -> price = $request->input('price');
        $product -> long_description = $request->input('long_description');
        $product -> save(); //registrar producto

        return redirect('/admin/products');
    }

    public function edit( $id ) {
//        $categories = Category::all(); //traer categorias
        // return "Mostrar aqui formulario para producto con id $id";
        $product = Product::find( $id );
        return view('admin.products.edit')->with(compact('product')); //formulario de registro
    }

    public function update( Request $request , $id ) {
        //dd($request->all());//el metodo permite imprimir todos los datos del request
        // return view(); //almacenar el registro de un producto
        //validar datos con reglas de laravel en documentacion hay mas
        //mensajes personalizados para cada campo
        $messages = [
            'name.required' => 'El nombre es un campo obligatorio',
            'name.min' => 'El nombre debe tener minimo 3 caracteres',
            'description.required' => 'La descripción es un campo obligatorio',
            'description.max' => 'La descripcion debe tener maximo 200 caracteres',
            'price.required' => 'El precio es un campo obligatorio',
            'price.numeric' => 'El precio es un campo de solo numeros',
            'price.min' => 'El precio no debe ser menor de cero'
        ];
        $rules = [
                'name' => 'required|min:3',
                'description' => 'required|max:200',
                'price' => 'required|numeric|min:0'
        ];
        $this->validate($request,$rules,$messages);
        //crear producto para actualizar buscandolo por su id
        $product = Product::find( $id );
        $product -> name = $request->input('name');
        $product -> description = $request->input('description');
        $product -> price = $request->input('price');
        $product -> long_description = $request->input('long_description');
        $product -> save(); //actualizar producto

        return redirect('/admin/products');
    }

    public function destroy( $id ) {
//        $categories = Category::all(); //traer categorias
        // return "Mostrar aqui formulario para producto con id $id";
        $product = Product::find( $id );
        $product -> delete(); //ELIMINAR
        return back(); //nos devuelve a la pagina anterior
    }

}
