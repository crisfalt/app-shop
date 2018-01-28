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

    public function getFeaturedImageUrlAttribute() {
        $featuredImage = $this->images()->where( 'featured' , true ) -> first();
        if( !$featuredImage ) {
            $featuredImage = $this -> images() -> first();
        }
        if( $featuredImage ) {
            return $featuredImage -> url; //url segun la creada en el modelo ProductImage::getUrlAttribute
        }
        //si no entra a ningun if se pone una imagen por defecto
        return '/images/products/default2.jpg';
    }

}
