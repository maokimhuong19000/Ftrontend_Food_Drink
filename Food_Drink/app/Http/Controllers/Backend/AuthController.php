<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct(){
        // // for Middleware open this
        // $this->middleware('auth');
        // $this->middleware(function($req,$next){
        //    app()->setLocale(Auth::user()->language);
        //    return $next($req);
        // });
     }
    public function index()
    {
        return view('backend.login');
    }

    public function login(){
        return view('backend.login');
    }

    public function postLogin(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = $req->only('email', 'password');

        if (Auth::attempt($user)) {
            return redirect('/admin')->with('login', 'success');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials.');
        }
    }
}
