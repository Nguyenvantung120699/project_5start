<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\User;

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
            $image=null;
            $ext_allow =["png","jpg","jpeg","gif","svg"];
            if($request->hasFile("image")){
                $file =$request->file("image");
                $filename=time()."-". $file->getClientOriginalName();//lay ten file
                $ext=$file->getClientOriginalExtension();//lay duoi file
                if (in_array($ext,$ext_allow)){
                    $file->move("upload",$filename);
                    $image="upload/".$filename;
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
            $image=null;
            $ext_allow =["png","jpg","jpeg","gif","svg"];
            if($request->hasFile("image")){
                $file =$request->file("image");
                $filename=time()."-". $file->getClientOriginalName();//lay ten file
                $ext=$file->getClientOriginalExtension();//lay duoi file
                if (in_array($ext,$ext_allow)){
                    $file->move("upload",$filename);
                    $image="upload/".$filename;
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
            "thumbnail" => "required|string",
            "category_id" => "required|integer",
            "brand_id" => "required|integer",
            "price" => "required|numeric",
            "quantity" => "required|integer"
        ]);
        try {
            Product::create([
                "product_name" => $request->get("product_name"),
                "product_desc" => $request->get("product_desc"),
                "thumbnail" => $request->get("thumbnail"),
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
            "thumbnail" => "required|string",
            "category_id" => "required|integer",
            "brand_id" => "required|integer",
            "price" => "required|numeric",
            "quantity" => "required|integer"
        ]);
        try {
            $product->update([
                "product_name" => $request->get("product_name"),
                "product_desc" => $request->get("product_desc"),
                "thumbnail" => $request->get("thumbnail"),
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

}
