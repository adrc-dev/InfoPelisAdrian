<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function signupForm()
    {
        return view('auth.signup');
    }

    public function signup(SignupRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->nickname = $request->input('nickname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('login')->with('message', 'Registrado con sucesso, haga login con sus credenciales.');
    }

    public function loginForm()
    {
        if (Auth::viaRemember()) {
            return redirect()->route('auth.user')->with('message', 'Bienvenido de nuevo ');
        } else if (Auth::check()) {
            return redirect()->route('auth.user');
        } else {
            return view('auth.login');
        }
    }

    public function login(Request $request) {

        $credentials = $request->only('email', 'password');
        $remember = ($request->get('remember')) ? true : false;

        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('auth.user');
        } else {
            $error = 'Error al acceder a la aplicacion';
            return view('auth.login', compact('error'));
        }
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }

    public function user(){
        return view('auth.user', ['user' => Auth::user()]);
    }
}
