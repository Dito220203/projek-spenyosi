<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
public function index() {
    return view('admin.loginadmin');

}

    public function authenticate(Request $request)
    {
         $request->validate([
            'nisn' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('nisn','password');
        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->withInput()->withErrors('incorrect username or password');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
