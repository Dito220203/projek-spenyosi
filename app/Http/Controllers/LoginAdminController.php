<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('admin.loginadmin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin'); // Sesuaikan tujuan redirect
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();                     // Keluar dari guard admin
        $request->session()->invalidate();                  // Hancurkan sesi
        $request->session()->regenerateToken(); // Regenerasi CSRF token
        return redirect('/login');
    }
}
