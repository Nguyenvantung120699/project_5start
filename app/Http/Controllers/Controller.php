<?php

namespace App\Http\Controllers;

use App\Feedback_product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrederCreate;
use App\Product;
use App\Category;
use App\Order;
use App\OrderProduct;
use App\User;
use App\Brand;
use App\Mail\CancelOrder;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function home(){
        $categories=Category::all();
        $purchased = Product::orderBy('purchase','asc')->take(8)->get();
        return view("home",['categories'=>$categories,'purchased'=>$purchased]);
        }
    public function rate(){
        $product=\App\Product::find(2);
        $rate = \App\Feedback_product::where("product_id",$product->id)->get();
//        dd($rate);
        return view("star",['rate'=>$rate]);
    }
    public function product($id){
        $product=Product::find($id);
        $rate=Feedback_product::where("product_id",$product->id)->get();
        $ratenew=Feedback_product::where("product_id",$product->id)->paginate(4);
        $brand = Brand::find($product->brand_id);
        $img =explode(",",$product->gallery);
        $category_product =Product::where("category_id",$product->category_id)->where('id',"!=",$product->id)->take(10)->get();
        $brand_product =Product::where("brand_id",$product->brand_id)->where('id',"!=",$product->id)->take(10)->get();
        return view('productView',['product'=>$product,'category_product'=>$category_product,'brand_product'=>$brand_product,'brand'=>$brand,'img'=>$img,'rate'=>$rate,'ratenew'=>$ratenew]);
    }
    public function contact(){
        return view("contact");
    }
    public function listingCategory($id){
        $category = Category::find($id);
        $product=$category->Products()->paginate(9);
        $categories=Category::all();
        $brands=Brand::all();
        return view("listingCategory",['products'=>$product,'category'=>$category,'categories'=>$categories,'brands'=>$brands]);
    }
    public function listingBrand($id){
        $brand = Brand::find($id);
        $product=$brand->Products()->paginate(9);
        $categories=Category::all();
        $brands=Brand::all();
        return view("listingBrand",['products'=>$product,'brand'=>$brand,'categories'=>$categories,'brands'=>$brands]);
    }
    public function shopping($id, Request $request){
        $product=Product::find($id);
        $cart =$request->session()->get("cart");

        if($cart==null){
            $cart=[];
        }
        foreach ($cart as $p){
            if($p->id == $product->id){
                $p->cart_qty =$p->cart_qty+1;
                session(["cart"=>$cart]);
                return redirect()->to("/cart");
            }
        }
        $product->cart_qty=1;
        $cart[]=$product;
        session(["cart"=>$cart]);
        return redirect()->to("/cart");
    }
    public function cart(Request $request){
    $cart = $request->session()->get("cart");
    if($cart == null){
        $cart = [];
    }
    $cart_total = 0 ;
    foreach ($cart as $p){
        $cart_total += ($p->price*$p->cart_qty);
    }
    return view("cart",["cart"=>$cart,'cart_total'=>$cart_total]);

}
    public function clearCart(Request $request){
        $request->session()->forget("cart");
        return redirect()->to("/");
    }
    public function checkout(Request $request){
        if(!$request->session()->has("cart")){
            return redirect()->to("/");
        }
        $cart = $request->session()->get('cart');
        $cart_total = 0;
        foreach ($cart as $p){
            $cart_total += ($p->price * $p->cart_qty);
        }
        return view("checkout",["cart"=>$cart,'cart_total'=>$cart_total]);
    }
    public function placeOrder(Request $request){
        $request->validate([
            'customer_name'=> 'required | string',
            'address' => 'required',
            'payment_method'=> 'required',
            'telephone'=> 'required',
        ]);

        $cart = $request->session()->get('cart');
        $grand_total = 0;
        foreach ($cart as $p){
            $grand_total += ($p->price * $p->cart_qty);
        }
        $order = Order::create([
            'user_id'=>Auth::id(),
            'customer_name'=> $request->get("customer_name"),
            'shipping_address'=> $request->get("address"),
            'telephone'=> $request->get("telephone"),
            'grand_total'=> $grand_total,
            'payment_method'=> $request->get("payment_method"),
            "status"=> Order::STATUS_PENDING
        ]);
        foreach ($cart as $p){
            $product = Product::find($p->id);
            $product->update([
                "quantity" => $product->quantity-$p->cart_qty,


            ]);
            DB::table("order_product")->insert([
                'order_id'=> $order->id,
                'product_id'=>$p->id,
                'qty'=>$p->cart_qty,
                'price'=>$p->price
            ]);
        }
        return redirect()->to("/checkout-success");
    }
    public function checkoutSuccess(){
        return view("checkoutSuccess");
    }
    public function feedback(Request $request){
        $request->validate([
            'customer_name'=> 'required | string',
            'email' => 'required',
            'telephone'=> 'required',
            'rate'=>'required',
            'message'=> 'required',
        ]);

        $cart = $request->session()->get('cart');
            foreach ($cart as $p){
                DB::table("feedback")->insert ([
                    'product_id'=> $p->id,
                    'name'=> $request->get("customer_name"),
                    'email'=> $request->get("email"),
                    'telephone'=> $request->get("telephone"),
                    'rate'=> $request->get("rate"),
                    'message'=> $request->get("message"),
                ]);
            }
        session()->forget('cart');
        return redirect()->to("/");
    }
    public function getSearch(Request $request){
        $product = Product::where('product_name','like','%'.$request->get("key").'%')->get();
        return view("search",['products'=>$product]);
    }
    public function getListOrder(){

        $listOrder =Order::where ("user_id",Auth::id())->get();
        return view('listOrder',['listOrder'=>$listOrder]);
    }
    public function getOrderPurchased($id){
        $order = Order::find($id);
        $product=$order->Products;
        return view('viewOrder',['product'=>$product,'order'=>$order]);
    }

    public function repurchase($id,Request $request){
        $order = Order::find($id);
        $product=$order->Products;

        $grand_total = 0;
        foreach ($product as $p) {
            $grand_total+=$p->pivot->qty*$p->price;

        }
        $o = Order::create([
            'user_id'=> Auth::id(),
            'customer_name'=> $order->customer_name,
            'shipping_address'=>$order->shipping_address,
            'telephone'=> $order->telephone,
            'grand_total'=> $grand_total,
            'payment_method'=>$order->payment_method,
            "status"=> Order::STATUS_PENDING
        ]);
        foreach ($product as $p){
            DB::table("order_product")->insert([
                'order_id'=> $o->id,
                'product_id'=>$p->id,
                'qty'=>$p->pivot->qty,
                'price'=>$p->pivot->price
            ]);
        }
        return redirect()->to("/checkout-success");
    }
}
