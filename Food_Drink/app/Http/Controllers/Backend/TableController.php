<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function table(){

        $food['food']=DB::table('food_menu')
        ->orderBy('food_id')
        ->paginate('4');
        $cfood['cfood'] = DB::table('food_category')
        ->select('food_category_id', 'food_category_name')
        ->get();

        return view('backend.table',$food,$cfood);
    }
}
