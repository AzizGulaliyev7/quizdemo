<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));
        return redirect('/login');
    }

    public function loginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return redirect('/');
        }
        return redirect()->back()->with('status', 'Such email and password does not exist');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
