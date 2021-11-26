<?php

namespace App\Http\Controllers;

use App\Mail\PassRecover;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
                if ($this->checkPasswordRecovery($credentials)) {
                    return response()->json(['status' => 'success']);
                }
                return response()->json(['status' => 'error', 'data' => ['errors' => 'Неверные данные']]);
            }
        }

        return response()->json(['status' => 'error', 'data' => $validator->errors()]);

    }

    public function checkPasswordRecovery($credentials)
    {
        $user = User::where('phone', $credentials['phone'])
                    ->first();
        if (!$user) {
            return false;
        }
        if (Hash::check($credentials['password'], $user->pass_recovery)) {
            $user->password = $user->pass_recovery;
            $user->pass_recovery = null;
            $user->save();
            $this->authUser($user->id);
            return true;
        }
        return false;
    }

    private function authUser($id)
    {
        Auth::loginUsingId($id);
    }

    public function userRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password'
        ]);

        if ($validator->passes()) {
            $user = new User();
            $user->email = $request->email;
            $user->phone = str_replace(['+7', ' ', '(', ')', '-'], '', $request->phone);
            $user->password = Hash::make($request->password);
            $user->save();

            $this->authUser($user->id);
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'error', 'data' => $validator->errors()]);
    }

    public function logout() {
        Auth::logout();

        return redirect()->back();
    }

    public function passwordRecovery(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->passes()) {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return response()->json(['status' => 'error', 'data' => ['errors' => 'Данный email не зарегистрирован в системе']]);
            }
            $newPassword = \Str::random(8);
            $user->pass_recovery = Hash::make($newPassword);
            $user->save();
            Mail::to($request->email)->send(new PassRecover($newPassword));

            return response()->json(['status' => 'message', 'data'=>'Вам на почту было направлено письмо с новым паролем']);
        }
        return response()->json(['status' => 'error', 'data' => $validator->errors()]);
    }
}
