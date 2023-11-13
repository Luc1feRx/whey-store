<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginView(){
        return view('frontend.auth.login');
    }

    public function loginPost(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
        return redirect()->back()->with(['error' => trans('message.login-in.failure')]);
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->to('/login');
    }

    public function postRegister(LoginRequest $request)
    {
        $data = $request->except("_token");
        $data['password'] =  Hash::make($data['password']);
        $data['name'] = $data['last_name'] . ' ' . $data['first_name'];
        $id = User::insertGetId($data);

        if ($id) {
            if (Auth::attempt(['email' => $request->email,'password' => $request->password])) {
                return redirect()->intended('/')->with(['success' => trans('message.register.success')]);
            }
        }

        return redirect()->back()->with(['error' => trans('message.register.failure')]);
    }
}
