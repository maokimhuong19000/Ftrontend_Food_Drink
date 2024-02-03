<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ButtonsController extends Controller
{

    public function button(){
        return view('backend.buttons');
    }
}
