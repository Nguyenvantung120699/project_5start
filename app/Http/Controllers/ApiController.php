<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ApiController extends BaseController
{
    public function productNewest($id, Request $request){
        $limit =10;
        $page = $request->has("page")?$request->get("page"):1;
        $offset = $limmit * ($page-1);
        $products =  Product::orderby("created_at","desc")->skip($offset)->take($limit)->get();
        return response()->json(['data'=>$products]);
    }
}