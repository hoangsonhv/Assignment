<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    public function all(){
        //
//        $brands= Brand::all();
        $brands=Brand::withCount("Products")->paginate(20);
        return view("brands.brands",[
            "brands"=>$brands
        ]);
    }
    public function new(){
        return view("brands.form");
    }
    public function save(Request $request){
        $request->validate([
            "name"=>"required",
        ],[
            "name.required"=>"Vui lòng nhập tên sản phẩm",
        ]);
        try {
            Brand::create([
                "name"=>$request->get("name")
            ]);
        }catch (\Exception $e){
            abort(404);
        }
        return redirect()->to("brands");
    }
    public function edit(Request $request,$id){
        $brand=Brand::findOrFail($id);
        return view("brands.edit",[
            "brand"=>$brand
        ]);
    }
    public function update(Request $request,$id){
        $brand=Brand::findOrFail($id);
        $request->validate([
            "name"=>"required",
        ],[
            "name.required"=>"Vui lòng nhập tên sản phẩm",
        ]);
        $brand->update([
                "name"=>$request->get("name"),
            ]
        );
        return redirect()->to("brands");
    }

}

