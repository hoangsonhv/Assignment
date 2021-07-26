<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home(){
        return view('Trangchu');
    }
    public function aboutus(){

    } public function productList(){
            $p = Product::with("Category")->get();
            return response()->json([
                "status"=>true,
                "message"=>"Success",
                "products"=>$p
            ]);
    }
}
