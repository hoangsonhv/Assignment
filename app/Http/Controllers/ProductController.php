<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Exception;

class ProductController extends Controller
{
    public function all(){
//        $products= DB::table("products")->get();
//        $products = Product::leftJoin("categories","categories.id","=","products.category_id")
//            ->select("products.*","categories.name as category_name")->get();
        $products=Product::with("Category")
//            ->where("category=y_id","=0",1)
//            ->whereDate("Created_at","2021-06-18")
//                ->whereMonth("created_at",6)
//                ->where("price",">",50000)
//                ->where("name","LIKE","%đỏ%")// tìm kiếm
//                ->orderBy("price","asc")
//                ->limit(1)// Lấy 1 thằng
//                ->skip(1)// Bỏ 1 thằng đầu tiên
            ->with("Brand")->paginate(50);

        return view("products.products",[
            "products"=>$products,

        ]);
    }
    public function new(){
//        $categories=DB::table("categories")->get();
        $categories = Category::all();
        $brands=Brand::all();
        return view("products.formPro",[
            "categories"=>$categories,
            "brands"=>$brands
        ]);
    }
    public function save(Request $request){
//        $data=$request->all();
//        dd($data);
//        $now = Carbon::now();
//        DB::table("products")->insert([
//           "name"=>$request->get("name"),
//           "image"=>$request->get("image"),
//           "description"=>$request->get("description"),
//           "price"=>$request->get("price"),
//           "qty"=>$request->get("qty"),
//           "category_id"=>$request->get("category_id"),
//            "created_at"=>$now,
//            "updated_at"=>$now
//        ]);
        $request->validate([
            "name"=>"required",
            "description"=>"required",
            "price"=>"required|min:0",
            "qty"=>"required|min:0",
            "category_id"=>"required|numeric|min:1",
            "brand_id"=>"required|numeric|min:1",
        ],[
            "name.required"=>"Vui lòng nhập tên sản phẩm",
            "description.required"=>"Vui lòng nhập mô tả",
            "price.required"=>"Vui lòng nhập giá sản phẩm",
            "qty.required"=>"Vui lòng nhập sô lượng",
            "category_id.min"=>"Vui lòng chọn danh mục",
            "brand_id.min"=>"Vui lòng chọn danh mục",
        ]);
        $image=null;
        if ($request->has("image")){
            $file = $request->file("image");
//            $fileName= $file->getClientOriginalName();//lays ten gile
            $extName= $file->getClientOriginalExtension();//lays tne duoi file
            $fileName= time().".".$extName;
            $size= $file->getSize();//lays size
            $allow=["png","jpg","jpeg","gif"];
            if (in_array($extName,$allow)){
                if ($size< 30000000){
                    try {
                        $file->move("upload",$fileName);
                        $image=$fileName;
                    }catch (\Exception $e){

                    }

                }
            }
        }

        try {
            Product::create([
                "name"=>$request->get("name"),
                "image"=>$image,
                "description"=>$request->get("description"),
                "price"=>$request->get("price"),
                "qty"=>$request->get("qty"),
                "category_id"=>$request->get("category_id"),
                "brand_id"=>$request->get("brand_id"),
            ]);
        }catch (\Exception $e){
            abort(40);
        }

        return redirect()->to("/products");
    }
    public  function edit(Request $request,$id){
//        $categories=DB::table("categories")->get();
//        $product=DB::table("products")->where("id",$id)->first();
        $categories=Category::all();
        $product=Product::findOrFail($id);
        $brands=Brand::all();
        if ($product==null) return redirect()->to("/products");
        return view("products.editPro",[
            "product"=>$product,
            "categories"=>$categories,
            "brands"=>$brands
        ]);
    }
    public  function update(Request $request,$id){
//        $product=DB::table("products")->where("id",$id)->first();
//        if ($product==null) return redirect()->to("/products");
//        DB::table("products")->where("id",$id)->update([
//            "name"=>$request->get("name"),
//            "image"=>$request->get("image"),
//            "description"=>$request->get("description"),
//            "price"=>$request->get("price"),
//            "qty"=>$request->get("qty"),
//            "category_id"=>$request->get("category_id"),
//            "updated_at"=>Carbon::now()
//        ]);
        $product=Product::findOrFail($id);
        $request->validate([
            "name"=>"required",
            "description"=>"required",
            "price"=>"required|min:0",
            "qty"=>"required|min:0",

        ],[
            "name.required"=>"Vui lòng nhập tên sản phẩm",
            "description.required"=>"Vui lòng nhập mô tả",
            "price.required"=>"Vui lòng nhập giá sản phẩm",
            "qty.required"=>"Vui lòng nhập sô lượng",

        ]);
        if($request->has("image")){
            $file = $request->file("image");
//            $fileName= $file->getClientOriginalName();//lays ten gile
            $extName= $file->getClientOriginalExtension();//lays tne duoi file
            $fileName= time().".".$extName;
            $size= $file->getSize();//lays size
            $allow=["png","jpg","jpeg","gif"];
            if (in_array($extName,$allow)){
                if ($size< 30000000){
                    try {
                        $file->move("upload",$fileName);
                        $image=$fileName;
                    }catch (\Exception $e){

                    }

                }
            }
        }
        if ($product==null) return redirect()->to("/products");
        $product->update([
            "name"=>$request->get("name"),
            "image"=>$image,
            "description"=>$request->get("description"),
            "price"=>$request->get("price"),
            "qty"=>$request->get("qty"),
            "category_id"=>$request->get("category_id"),
            "brand_id"=>$request->get("brand_id"),
        ]);
        return redirect()->to("/products");
    }
    public function delete($id){
        Product::findOrFail($id)->delete();
        return redirect()->to("/products");

    }
    public function addToCart($id){
//        $product = Product::findOrFail($id);
//        $cart=[];
//        if (session()->has("cart")){
//            $cart = session("cart");
//        }
//        if ($this->checkCart($cart,$product)){//san pham chua co trong igo hang
//            $product->cart_qty=1;// gior hangf them 1 thuoc tinh ngoai le dede bieu thi so luong san phaam trong gio hang
//            $cart[]=$product;
//        }else{
//            for ($i=0;$i<count($cart);$i++){
//                if ($cart[$i]->id == $product->id){
//                    $cart[$i]->cartqty = $cart[$i]->cartqty +1;
//                }
//            }
//        }
//        session("cart",$cart);
//        return redirect()->to("cart");
        $product = Product::findOrFail($id);
        $cart=[];
        if (Session::has("cart")){
            $cart = Session::get("cart");
        }
        if (!$this->checkCart($cart,$product)){//san pham chua co trong igo hang
            $product->cart_qty=1;// gior hangf them 1 thuoc tinh ngoai le dede bieu thi so luong san phaam trong gio hang
            $cart[]=$product;
        }else{
            for ($i=0;$i<count($cart);$i++){
                if ($cart[$i]->id == $product->id){
                    $cart[$i]->cart_qty = $cart[$i]->cart_qty +1;
                }
            }
        }
        Session::put("cart",$cart);
        return redirect()->to("cart");

    }
    private function checkCart($cart,$p){
        foreach ($cart as $item){
            if ($item->id==$p->id){
                return true;
            }
        }
        return false;
    }
    public function cart(){
        $cart=[];
        if (session()->has("cart")){
            $cart= session("cart");
        }
        return redirect()->back();
    }
    public function checkout(){
        $cart = [];// mảng giỏ hàng
        if(session()->has("cart")){ // nếu có giỏ hàng rồi
            $cart = session("cart");// $_SESSION["cart"]
        }
        if(count($cart)){
            return view("checkout",["cart"=>$cart,
                "cities"=>City::all()]);
        }
        return redirect()->to("cart");
    }
    public function placeOrder(Request $request){
        $request->validate([
            "customer_name"=>"required",
            "customer_tel"=>"required",
            "customer_address"=>"required",
        ]);
        try {
            $cart = Session::get("cart");
            if (count($cart)==0)return redirect()->to("/");
            $grandTotal=0;
            foreach ($cart as $item){
                $grandTotal += $item->price*$item->cart_qty;
            }
            $order = Order::create([
                "customer_name"=>$request->get("customer_name"),
                "customer_tel"=>$request->get("customer_tel"),
                "customer_address"=>$request->get("customer_address"),
                "grand_total"=>$grandTotal,
            ]);
            foreach ($cart as $item){
                DB::table("order_items")->insert([
                    "order_id"=>$order->id,
                    "product_id"=>$item->id,
                    "price"=>$item->price,
                    "qty"=>$item->cart_qty,
                ]);
                $p = Product::find($item->id);
                $p->qty-=$item->cart_qty;
                $p->save();
            }
            Session::forget("cart");
            return "done";
        }catch (Exception $e){
            die("error");
        }
    }
    public function checkOutApi(){
        $cart=[];
        if(session()->has("cart")){ // nếu có giỏ hàng rồi
            $cart = session("cart");// $_SESSION["cart"]
        }
        $cart = [];// mảng giỏ hàng
        if(session()->has("cart")){ // nếu có giỏ hàng rồi
            $cart = session("cart");// $_SESSION["cart"]
        }
        if(count($cart)){
            return response()->json([
                "status"=>true,
                "message"=>"Success",
                "cart"=>$cart
            ]);
        }
        return redirect()->to("cart");
    }
    //
    public  function CityApi(){
        $city=City::all();
        return response()->json([
            "status"=>true,
            "message"=>"Success",
            "city"=>$city
        ]);

    }
}
