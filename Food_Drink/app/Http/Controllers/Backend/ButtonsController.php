<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ButtonsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(function($req,$next){
           app()->setLocale(Auth::user()->language);
           return $next($req);
        });
     }
    public function button(){
        $cfood['cfood'] = DB::table('food_category')
        ->select('food_category_id', 'food_category_name')
        ->get();
        return view('backend.buttons',$cfood);
    }
}
