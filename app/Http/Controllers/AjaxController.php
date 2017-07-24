<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\Product;

class AjaxController extends Controller
{
    public function addToCart($idProduct, Request $request)
    {	
    	$product = Product::find($idProduct);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addToCart($product, $idProduct);
        $request->session()->put('cart',$cart);

        // dd($cart);
    }
}
