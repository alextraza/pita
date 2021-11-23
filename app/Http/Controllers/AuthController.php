<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')
            ->withSuccess('Добро пожаловать.');
        }

        return redirect('login')->withInput()->withSuccess('Неверные данные');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return redirect()->back();
    }

    //frontend methods

    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            $credentials = [
                'phone' => str_replace(['+7', ' ', '(', ')', '-'], '', $request->phone),
                'password' => $request->password,
                ];
            if (Auth::attempt($credentials)) {
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'error', 'data' => ['errors' => 'Неверные данные']]);
            }
        }

        return response()->json(['status' => 'error', 'data' => $validator->errors()]);

    }

    public function logout() {
        Auth::logout();

        return redirect()->back();
    }
}
