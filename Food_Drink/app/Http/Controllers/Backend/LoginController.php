<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(function($req,$next){
           app()->setLocale(Auth::user()->language);
           return $next($req);
        });
     }
    public function login(){
        return view('backend.login');
    }
}
