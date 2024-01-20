<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InsertFoodController extends Controller
{
    public function insert(){
        return view('backend.insertdata');
    }
}
