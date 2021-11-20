<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class CartController extends Controller
{
    protected $_id;
    protected $_header;
    protected $_count;
    protected $_weight;
    protected $_options;

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
     * param Illuminate\Http\Request     $request
     */
    public function add(Request $request)
    {
        $item = Item::where('id', $request->id)->first();
        if ($item) {
            $this->setCart($item, $request);
            $this->saveCart();
        }
        return response()->view('components.minicart');
    }

    /**
     * add to cart and reload page
     */
    public function addOffer(Request $request, $id)
    {
        $item = Item::where('id', $id)->first();
        if ($item) {
            $this->setCart($item, $request);
            $this->saveCart();
        }
        return redirect()->back();
    }

    /**
     * update cart action
     * param Illuminate\Http\Request     $request
     */
    public function update(Request $request)
    {
        $rowId = $request->rowId;
        \Cart::update($rowId, $request->count);
        return response()->json([
            'result' => 'success',
            'total' => \Cart::total(),
            'price' => \Cart::get($rowId)->price]
        );
    }

    /**
     * remove cart action
     * param Illuminate\Http\Request     $request
     */
    public function rm(Request $request)
    {
        \Cart::remove($request->id);
        return response()->json(['result' => 'success', 'total' => \Cart::total()]);
    }

    private function saveCart()
    {
        \Cart::add(
            $this->_id,
            $this->_header,
            $this->_count,
            $this->_price,
            $this->_weight,
            $this->_options
        );

    }

    /**
     * set cart options
     * @param App\Models\Item            $item
     * @param Illuminate\Http\Request    $request
     */
    private function setCart(Item $item, Request $request)
    {
        // set defaut values
        $this->_count = $request->count ?? 1;
        $this->_header = $item->header;

        if ($request->has_alt) {
            $this->_weight = $item->weight_alt;
            $this->_price = $item->price_alt;
            $this->_id = $item->id . '_1';
        } else {
            $this->_weight = $item->weight;
            $this->_price = $item->price;
            $this->_id = $item->id;
        }
        if ($this->_weight) {
            $this->_header = $this->_header . ' - ' . $this->_weight . 'г';
        }

        $this->_weight = $this->_weight ? $this->_weight : 0;
        $this->_options = [
            'image' => $item->image,
            'category' => $item->category->header
        ];
    }
}
