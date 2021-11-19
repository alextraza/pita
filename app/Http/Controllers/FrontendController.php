<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('welcome');
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
