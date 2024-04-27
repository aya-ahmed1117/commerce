<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\product;
use App\Models\blog;
use App\Models\Service;
use GuzzleHttp\Psr7\Message;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homepage()
    {
        // return view('dashboard.pages.login');
        // return view('home');
        // if (auth()->check()) {
        //     if(auth()->user()->is_admin == 1){
        //         return view('dashboard.pages.home');
        //     }
        //     else{
                 return view('frontend.layouts.master');

        //     }

        //     //return view('dashboard.pages.login');
        // }


    }
    // public function homeDash(){
    //     if (auth()->check()) {
    //         if(auth()->user()->is_admin == 1){
    //     return view('dashboard.pages.home');
    //         }
    //     if(auth()->user()->is_admin == 0){
    //     return view('frontend.layouts.master');

    //         }
    //     }
    //     else{
    //         return view('dashboard.pages.login');
    //     }

    // }
    public function dashboard(){
      //  return view('dashboard.pages.home');
        if (Auth()->check()) {
            if(Auth()->user()->is_admin == 1){
                $Allproduct = product::count();
                $Allblog = blog::count();
                $AllService = Service::count();
                $AllUser = user::count();
            return view('dashboard.pages.home',
            compact('Allproduct','Allblog','AllService','AllUser'));
              }

            }else{
                return view('dashboard.pages.login');
            }

    }
    public function forgot(){
        return view('auth.forgot-password');
    }
    public function getLogen(){
        return view('dashboard.pages.login');
    }

    public function postLogin(Request $request)
    {
        // $credentials = $request->only('email', 'password','is_admin');
                $request->validate([
                    'email' => 'required',
                    'password' => 'required',
                ]);
        $credentials = $request->only('email', 'password');
        //if (Auth()->check()) {
            if(auth()->attempt($credentials)){
        //if (Auth::attempt($credentials)) {
                if(Auth::user()->is_admin === 1){
                    return redirect()->route('dashboard');
                }
        //}
            }
            else{
                return redirect()->route('frontend.homepage');
            }

        //return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function logout()
    {
        // Session::flush();
        Auth::logout();
        return redirect()->route('getLogen');
    }
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
    //     $credentials = $request->only('email', 'password');
    //         if(auth()->attempt($credentials)){


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
        return redirect()->route("dashboard")->withSuccess('You have signed-in');
    }
    public function create(array $data)
    {
        return user::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'created_at' =>now()
        ]);
    }

}
