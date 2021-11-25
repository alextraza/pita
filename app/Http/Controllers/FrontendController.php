<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use Auth;
use Hash;
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

    public function userSave(Request $request)
    {
        $validator = $request->validate([
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'password_confirmation' => 'required_with:password|same:password'
        ]);

        $user = Auth::user();
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if ($user->email != $request->email) {
            $user->email = $request->email;
        }
        $phone = str_replace(['+7', ' ', '(', ')', '-'], '', $request->phone);
        if ($user->phone != $phone) {
            $user->phoen = $phone;
        }
        if ($user->name != $request->name) {
            $user->name = $request->name;
        }
        $user->save();

        return back()->withSuccess('Данные успешно обновлены');
    }
}
