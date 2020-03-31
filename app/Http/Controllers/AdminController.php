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


    //group function category
    public function category(){
        $categorys = Category::all();
        return view('admin.category.index',['categorys'=>$categorys]);
    }
    public function categoryCreate(){
        return view('admin.category.create');
    }

    //group function product
    public function product(){
        $products = Product::all();
        return view('admin.product.index',['products'=>$products]);
    }
    public function productCreate(){
        return view('admin.product.create');
    }

    //group function user
    public function user(){
        return view('admin.user.index');
    }
    public function userCreate(){
        return view('admin.user.create');
    }
}