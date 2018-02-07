<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //actualizar el carrito de compras a confirmado por el cliente
    public function update() {
        $notification = 'No se puede realizar tu pedido. El carrito esta vacio';
        $cartActual = auth() -> user() -> cart; //traigo el carrito que pertenece al usuario logueado
        if( $cartActual -> details -> count() > 0 ) {
            $cartActual -> status = 'Pending'; //cambio el estado del carrito de este usuario a pendiente
            $cartActual -> save(); //atualizo el carrito
            $notification = 'Tu Pedido se ha actualizado correctamente. Te contactaremos via Email!';
        }
        return back() -> with( compact('notification') );
    }
}
