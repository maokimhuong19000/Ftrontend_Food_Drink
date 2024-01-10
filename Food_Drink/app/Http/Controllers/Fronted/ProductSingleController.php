<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductSingleController extends Controller
{
    public function productsingle(){
        return view('frontend.product-single');
    }
}
