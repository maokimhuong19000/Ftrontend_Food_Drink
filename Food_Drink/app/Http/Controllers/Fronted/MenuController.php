<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function menu(){
        $food['food']=DB::table('food_menu')
        ->where('food_active','1')
        ->get();
        // $foodd ['food_category']=DB::table('food_category')->get();

        return view('frontend.menu',$food);
    }
}
