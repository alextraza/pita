<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
    * show cart action
    * param Illuminate\Http\Request     $requst
    */

    public function index(Request $request)
    {
        return view('cart');
    }

    /**
    * add to cart action
    * param Illuminate\Http\Request     $requst
    */

    public function add(Request $request)
    {
        $data = $request->all();
        $item = Item::where('id', $request->id)->first();
        if ($item) {
            if (isset($requsts->has_alt)) {
                $price = $item->price_alt;
                $header = $item->header . ' - ' . $item->weight_alt . 'г';
            } else {
                $price = $item->price;
                $header = $item->header;
            }
            Cart::add($item->id, $header, $price);
        }

        echo view('components.minicart');
    }

    /**
    * update cart action
    * param Illuminate\Http\Request     $requst
    */

    public function update(Request $request)
    {
       //
    }

    /**
    * remove cart action
    * param Illuminate\Http\Request     $requst
    */

    public function rm(Request $request)
    {
       //
    }
}
