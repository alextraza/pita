<?php

namespace App\Http\Controllers;

use App\Models\{Category, Page, Address};
use Auth;
use Hash;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
    * show homepage
    */
    public function index()
    {
        $categories = Category::where('status', true)
                              ->orderBy('pos')
                              ->get();
        return view('welcome', compact('categories'));
    }

    /**
    * show cart page
    */
    public function cart()
    {
        return view('cart');
    }

    /**
    * show page with slug
    * @param string $slug
    */
    public function page($slug)
    {
       $model = Page::where('slug', $slug)->firstOrFail();
        dd($model);
    }

    /**
    * show user page
    */
    public function user()
    {
        if ($user = Auth::user()) {
            return view('user', compact('user'));
        }

        return redirect(route('index'))->withSuccess('Для доступа в личный кабинет необходима авторизация');
    }

    /**
    * save user data from cabinet
    * @param Illuminate\Http\Request $request
    *
    * return Response
    */
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

    public function addressSave(Request $request)
    {
        $validator = $request->validate([
            'street' => 'required',
            'house' => 'required',
            'entrance' => 'numeric|nullable',
            'apartment' => 'numeric|nullable',
            'floor' => 'numeric|nullable',
            'code' => 'nullable|string|max:10'
        ]);

        if ($request->id) {
            $model = Address::where('id', $request->id)->first();
            $action = 'изменен';
        } else {
            $model = new Address();
            $action = 'добавлен';
        }

        $model->street = $request->street;
        $model->house = $request->house;
        $model->entrance = $request->entrance;
        $model->apartment = $request->apartment;
        $model->floor = $request->floor;
        $model->code = $request->code;
        $model->user_id = Auth::user()->id;
        $model->save();

        return back()->withSuccess('Адрес был успешно ' . $action);
    }

    public function addressDelEdit(Request $request)
    {
        if ($request->action == 'remove') {
            Address::destroy($request->id);
            return response()->json(['status' => 'removed']);
        }

        $model = Address::where('id', $request->id)->first();
        $view = view('components.address', compact('model'))->render();
        return response()->json(['status' => 'edited', 'result' => $view]);
    }
}
