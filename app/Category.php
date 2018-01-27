<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Category -> pructs
    public function products() {
        return $this->hasMany(Product::class); //1 categoria contiene muchas categorias
    }

}
