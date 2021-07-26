<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function all(){
        //
//        $categories= Category::all();//tra ve object cua categories
//        $categories=DB::table("categories")->get();
//        $categories = Category::withCount("Products")->get();
        $categories = Category::withCount("Products")->paginate(10);

        return view("categories.cate",[
            "categories"=>$categories
        ]);
    }
    public function new(){
        return view("categories.form");
    }
    public function save(Request $request){
//        $data= $request->all();
//        dd($data);
        $n = $request->get("name");
        $now = Carbon::now();
//        DB::table("categories")->insert([
//           "name"=>$n,
//            "created_at"=>$now,
//            "updated_at"=>$now
//        ]);
        try {
            Category::create([
                "name"=>$n,
            ]);
        }catch (\Exception $e){
            abort(404);
        }

        return redirect()->to("categories");
    }
    public function edit(Request $request,$id){

//        $cat = DB::table("categories")->where("id",$id)->first();// tra ve null neu ko co
//        if($cat == null) return redirect()->to("categories");
        $cat = Category::findOrFail($id);//Tra ve 1 object Category, ko thấy thì sang trang 404
        return view("categories.edit",[
            "cat"=>$cat
        ]);
    }
    public  function update(Request $request,$id){
//        $cat = DB::table("categories")->where("id",$id)->first();
//        if ($cat==null )return redirect()->to("categories");
//        DB::table("categories")->where("id",$id)->update([
//           "name"=>$request->get("name"),
//            "updated_at"=>Carbon::now()
//        ]);

        $cat = Category::findOrFail($id);
        $cat->update([
            "name"=>$request->get("name"),
        ]);
        return redirect()->to("categories");
    }
}
