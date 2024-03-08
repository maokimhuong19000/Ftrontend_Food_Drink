<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ButtonsController extends Controller
{
    public function button(){
        $cfood['cfood'] = DB::table('food_category')
        ->select('food_category_id', 'food_category_name')
        ->get();
        return view('backend.buttons',$cfood);
    }
}
