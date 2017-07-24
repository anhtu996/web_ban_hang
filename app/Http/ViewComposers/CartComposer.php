<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\ProductType;
use Session;
class CartComposer
{
    protected $cartProduct;

    public function __construct()
    {
        if(session('cart')){
            $this->cartProduct = Session::get('cart');
        }
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('cartProduct', $this->cartProduct);
    }
}