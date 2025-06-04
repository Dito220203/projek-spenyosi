<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
public function index() {
    return view('siswa.login');

}

    public function login(Request $request)
    {
         $request->validate([
            'nis' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('nis','password');
        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/siswa');
        }

        return back()->withInput()->withErrors('incorrect username or password');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
