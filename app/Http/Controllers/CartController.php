<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class CartController extends Controller
{
    /**
    * show cart action
    * param Illuminate\Http\Request     $requst
    */

    public function index(Request $request)
    {
        $categories = Category::where('status', true)->orderBy('pos')->get();
        return view('cart', compact('categories'));
    }

    /**
    * add to cart action
    * param Illuminate\Http\Request     $requst
    */

    public function add(Request $request)
    {
        $item = Item::where('id', $request->id)->first();
        if ($item) {
            $count = $request->count ?? 1;
            if ($request->has_alt) {
                $weight = $item->weight_alt;
                $price = $item->price_alt;
                $id = $item->id . '_1';
            } else {
                $weight = $item->weight;
                $price = $item->price;
                $id = $item->id;
            }
            if ($weight) {
                $header = $item->header . ' - ' . $weight . 'г';
            }
            \Cart::add($id, $header, $count, $price, $weight, [
                'category' => $item->category->header,
                'image' => $item->image
            ]);
        }

        return response()->view('components.minicart');
    }

    /**
    * update cart action
    * param Illuminate\Http\Request     $requst
    */

    public function update(Request $request)
    {

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
