<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\{Order, Address, User};
use App\Http\Requests\StoreOrder;

class CheckoutController extends Controller
{
    /**
    * Show checkout page
    *
    * @return view
    */
    public function index()
    {
        return view('checkout');
    }

    /**
    * Store order from checkout
    *
    * @param App\Http\Request\StoreOrder $request
    */
    public function store(StoreOrder $request)
    {
        dd($request->all());
    }
}
