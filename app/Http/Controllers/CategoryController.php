<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Mostrar get
    public function show( Category $category ) {
        return view('categories.show') -> with( compact( 'category' ) );
    }
}
