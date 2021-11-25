<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use Auth;
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

    public function user()
    {
        if ($user = Auth::user()) {
            return view('user', compact('user'));
        }

        return redirect(route('index'))->withSuccess('Для доступа в личный кабинет необходима авторизация');
    }
}
