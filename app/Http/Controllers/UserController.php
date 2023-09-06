<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register_view()
    {
        return view('Auth.register');
    }
    public function login_view()
    {
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        $accessToken = $user->createToken('authToken')->plainTextToken;
        Auth::login($user, true);
        return view('Auth.login')->with('accessToken', $accessToken);
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($credentials, true)) {
            if (auth()->user()->isAdmin()) {
                return redirect('/dashboard');
            } else {
                $accessToken = auth()->user()->createToken('authToken')->plainTextToken;
                return view('Auth.login')->with('accessToken', $accessToken);
            }
        } else {
            return back()->withErrors(['email' => 'Email ou mot de passe incorrect.'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            $request->user()->tokens()->delete();
            auth()->guard('web')->logout();
            return view('Auth.logout');
        } else {
            return redirect('/home');
        }
    }
}
