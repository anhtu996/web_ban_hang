<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\ProductType;

class ProfileComposer
{
    protected $listMenu;

    public function __construct()
    {
        $this->listMenu = ProductType::all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('listMenu', $this->listMenu);
    }
}