<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //$product -> Category
    public function Category() {
        return $this->belongsTo(Category::class); //1 pdoducto pertene a una categoria
    }

    //$product -> $images
    public function images() {
        return $this->hasMany(ProductImage::class); //1 pdoducto pertene a una categoria
    }

}
