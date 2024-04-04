<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DatatableController extends Controller
{
    public function dtroom(){

        $food['food']=DB::table('food_menu')
        ->orderBy('food_id')
        ->where('food_active','1')->get();
        $cfood['cfood'] = DB::table('food_category')
        ->select('food_category_id', 'food_category_name')
        ->get();
        return view('backend.dTtable', $food, $cfood);
    }
}
