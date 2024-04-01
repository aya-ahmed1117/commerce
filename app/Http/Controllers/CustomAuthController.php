<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class CustomAuthController extends Controller
{
    public function index()
    {
        // return view('auth.login');
        return view('dashboard.pages.login');
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return view('dashboard.pages.home');
            // return redirect()->intended('dashboard')
            //     ->withSuccess('Signed in');
        }
        //return redirect("login")->withSuccess('Login details are not valid');
        // return view('dashboard.pages.login');
        return view('dashboard.pages.home');
    }
    public function registration()
    {
        // return view('auth.register');
        return view('dashboard.pages.registration');
    }
    public function customRegistration(Request $request)
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
        return user::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
    public function dashboard()
    {
        if (auth()->validate()) {
            return view('dashboard.pages.home');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function signOut()
    {
       // Session::flush();
        user::logout();
        // return Redirect('login');
        return view('dashboard.pages.login');
    }
}

