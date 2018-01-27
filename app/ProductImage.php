<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //$image -> $product
    public function product() {
        return $this->belongsTo(Product::class); //1 pdoducto pertene a una categoria
    }

}
