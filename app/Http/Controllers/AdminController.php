<?php

namespace App\Http\Controllers;

use App\Feedback_product;
use App\Order;
use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\User;

use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function homeadmin(){
        return view('admin.index');
    }


    //group function brand
    public function brand(){
        $brands =Brand::all();
        return view('admin.brand.index',['brands'=>$brands]);
    }
    public function brandCreate(){
        return view('admin.brand.create');
    }

    public function brandStore(Request $request){
        $request->validate([
            "brand_name"=> "required|string|unique:brand"
        ]);
        try{
            Brand::create([
                "brand_name"=> $request->get("brand_name")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/brand");
    }


    public function brandEdit($id){
        $brands = Brand::find($id);
        return view('admin.brand.edit',['brands'=>$brands]);
    }
    public function brandUpdate($id,Request $request){
        $brands = Brand::find($id);
        $request->validate([
            "brand_name"=> "required|string|unique:brand,brand_name,".$id
        ]);

        try{
            $brands->update([
                "brand_name"=> $request->get("brand_name")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/brand");
    }


    public function brandDestroy($id){
        $brands = Brand::find($id);
        try {
            $brands->delete();

        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/brand");
    }

    //group function category
    public function category(){
        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }
    public function categoryCreate(){
        return view('admin.category.create');
    }

    public function categoryStore(Request $request){
        $request->validate([
            "category_name"=> "required|string|unique:category"
        ]);
        try{
            $image = null;
            $ext_allow = ["png","jpg","jpeg","gif","svg"];
            if($request->hasFile("image")){
                $file = $request->file("image");
                $file_name = time()."_".$file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                if(in_array($ext,$ext_allow)){
                    $file->move("uploads",$file_name);
                    $image = "uploads/".$file_name;
                }       
            }
            Category::create([
                "category_name"=> $request->get("category_name"),
                'image'=>$image
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/category");
    }


    public function categoryEdit($id){
        $categories = Category::find($id);
        return view("admin.category.edit",['categories'=>$categories]);
    }
    public function categoryUpdate($id,Request $request){
        $categories = Category::find($id);
        $request->validate([
            "category_name"=> "required|string|unique:category,category_name,".$id
        ]);
        try {
            $image = null;
            $ext_allow = ["png","jpg","jpeg","gif","svg"];
            if($request->hasFile("image")){
                $file = $request->file("image");
                $file_name = time()."_".$file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                if(in_array($ext,$ext_allow)){
                    $file->move("uploads",$file_name);
                    $image = "uploads/".$file_name;
                }       
            }
            $categories->update([
                "category_name"=> $request->get('category_name'),
                'image'=>$image
            ]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/category");
    }



    public function categoryDestroy($id){
        $categories = Category::find($id);
        try {
            $categories->delete();
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/category");
    }


   // group function product
    public function products(){
        $products = Product::all();
        return view('admin.product.index',['products'=>$products]);
    }
    public function productCreate(){

        return view("admin.product.create");
    }

    public function productStore(Request $request){
        $request->validate([
            "product_name" => "required|string|unique:product",
            "product_desc" => "required|string",
            "category_id" => "required|integer",
            "brand_id" => "required|integer",
            "price" => "required|numeric",
            "quantity" => "required|integer"
        ]);
        try {
            $thumbnail = null;
            $ext_allow = ["png","jpg","jpeg","gif","svg"];
            if($request->hasFile("thumbnail")){
                $file = $request->file("thumbnail");
                $file_name = time()."_".$file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                if(in_array($ext,$ext_allow)){
                    $file->move("uploads",$file_name);
                    $thumbnail = "uploads/".$file_name;
                }      
            }

            $gallery = null;
            $ext_allowg = ["png","jpg","jpeg","gif","svg"];
            if($request->hasFile("gallery")){
                $fileg = $request->file("gallery");
                $file_gname = time()."_".$fileg->getClientOriginalName();
                $extg = $fileg->getClientOriginalExtension();
                if(in_array($extg,$ext_allowg)){
                    $fileg->move("uploads",$file_gname);
                    $gallery = "uploads/".$file_gname;
                }      
            }
            Product::create([
                "product_name" => $request->get("product_name"),
                "product_desc" => $request->get("product_desc"),
                'thumbnail' => $thumbnail,
                'gallery' => $gallery,
                "category_id" => $request->get("category_id"),
                "brand_id" => $request->get("brand_id"),
                "price" => $request->get("price"),
                "quantity" => $request->get("quantity")
            ]);
        } catch (Exception $e) {
            return redirect()->back();
        }
        return redirect()->to("admin/product");
    }

    public function productEdit($id){

        $products = Product::find($id);
        return view("admin.product.edit",['products'=>$products]);
    }

    public function productUpdate($id,Request $request){
        $product = Product::find($id);
        $request->validate([
            "product_name" =>
            "required|string|unique:product,product_name," . $id,
            "product_desc" => "required|string",
            "category_id" => "required|integer",
            "brand_id" => "required|integer",
            "price" => "required|numeric",
            "quantity" => "required|integer"
        ]);
        try {
            $thumbnaile = null;
            $ext_allowe = ["png","jpg","jpeg","gif","svg"];
            if($request->hasFile("thumbnaile")){
                $filee = $request->file("thumbnaile");
                $file_namee = time()."_".$filee->getClientOriginalName();
                $exte = $filee->getClientOriginalExtension();
                if(in_array($exte,$ext_allowe)){
                    $filee->move("uploads",$file_namee);
                    $thumbnaile = "uploads/".$file_namee;
                }      
            }

            $gallerye = null;
            $ext_allowge = ["png","jpg","jpeg","gif","svg"];
            if($request->hasFile("gallerye")){
                $filege = $request->file("gallerye");
                $file_gename = time()."_".$filege->getClientOriginalName();
                $extg = $filege->getClientOriginalExtension();
                if(in_array($extg,$ext_allowge)){
                    $filege->move("uploads",$file_gename);
                    $gallerye = "uploads/".$file_gename;
                }      
            }
            $product->update([
                "product_name" => $request->get("product_name"),
                "product_desc" => $request->get("product_desc"),
                'thumbnail' => $thumbnaile,
                'gallery' => $gallerye,
                "category_id" => $request->get("category_id"),
                "brand_id" => $request->get("brand_id"),
                "price" => $request->get("price"),
                "quantity" => $request->get("quantity")
            ]);
        } catch (Exception $e) {
            return redirect()->back();
        }
        return redirect()->to("admin/product");
    }

    public function productDestroy($id){

        $product = Product::find($id);
        try {
            $product->delete();

        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/product");
    }

    //group function user
    public function user(){
        $user = User::all();
        return view('admin.user.index',['user'=>$user]);
    }
    public function userCreate(){
        return view('admin.user.create');
    }
    public function userStore(Request $request){
        $request->validate([
            "email"=> "required|string|max:255|unique:users",
            "name"=> "required|string",
            "password"=> "required|string",
        ]);
        try{
            User::create([
                "name"=> $request->get("name"),
                "email"=> $request->get("email"),
                "password"=> $request->get("password"),
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/user");
    }


    public function userEdit($id){
        $user = User::find($id);
        return view('admin.user.edit',['user'=>$user]);
    }
    public function userUpdate($id,Request $request){
        $user = User::find($id);
        $request->validate([
            "name"=> "required|string|max:255:users,name,".$id,
            "email"=> "required|string|email|max:255|unique:users,email,".$id,
            "password"=> "required|string|min:8:users,password,".$id,
            "role"=> "required|Integer:users,role,".$id,
        ]);
        try{
            $user->update([
                "name"=> $request->get("name"),
                "email"=> $request->get("email"),
                "password" => $request->get("password"),
                "role"=> $request->get("role")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/user");
    }


    public function userDestroy($id){
        $user = User::find($id);
        try {
            $user->delete();

        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/user");
    }
    // function feedback
    public function feedBackNow()
    {
            $feedBack = DB::table('feedback')->orderBy('id','desc')->get();
            return view('admin.feedback',['feedback'=>$feedBack]);
    }
    // function order
    public function order()
    {
        $order = DB::table('order')->orderBy('created_at','desc')->get();
        return view('admin.order',['order'=>$order]);
    }


    //status order
    public function statusOrder($id,Request $request)
    {
        $order = Order::find($id);
        $request->validate([
            "status"=> "required|Integer:order,status,".$id
        ]);
        try{
            $order->update([
                "status"=> $request->get("status")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/order");
    }
}   