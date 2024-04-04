<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function usertable(Request $req){
        
        $datauser=DB::table('users')->get();
        
        return view('backend.user_table',compact('datauser'));
    }
}
