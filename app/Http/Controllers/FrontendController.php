<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', true)
                              ->orderBy('pos')
                              ->get();
        return view('welcome', compact('categories'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function page($slug)
    {
       $model = Page::where('slug', $slug)->firstOrFail();
        dd($model);
    }
}
