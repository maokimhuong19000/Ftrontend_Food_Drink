<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login()
    {
        return view('backend.login');
    }
    public function go(Request $req)
    {
        $name = $req->name;
        $password = md5($req->password);
        // dd($name,$password);
        $user = DB::table('users')
            ->where("name", $name)
            ->where("password", $password)
            ->first();

        // dd($name, $password);

        if($name != null){
            session()->flash('success','Login success');
          
        }else{
            session()->flash('error','Login failed');
            return view('backend.login');
        }
    }


}
