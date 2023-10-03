<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard.index');
        }
        return view('backend.auth.login');
    }
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::guard('admin')->attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard.index');
        }
        return back()->with('toast_error', 'Đăng nhập thất bại');
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->flush();

        $request->session()->regenerate();
        return redirect()->route('admin.login');
    }
}
