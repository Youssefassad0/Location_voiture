<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate(([
            'email' => 'required|email',
            'password' => 'required'
        ]));
        $checkForm = $request->only('email', 'password');
        if (Auth::attempt($checkForm)) {
            Session::flash('success', " you're logged in successfely  ");
            return redirect()->intended(route('voitures.index'));
        } else {
            return to_route('login')->with('error', 'email or password incorrect ! ')->onlyInput('email');
        }
    }
    public function postRegister(Request $request)
    {
        $request->validate(([
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]));
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return to_route('login')->with('success', 'vous etes bien  enregistrer ');
    }
    public function Logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home')->with('success', 'Au revoir !!! ');
    }
}
