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
                    $file->move("upload",$file_name);
                    $image = "upload/".$file_name;
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
                    $file->move("upload",$file_name);
                    $image = "upload/".$file_name;
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
                    $file->move("upload",$file_name);
                    $thumbnail = "upload/".$file_name;
                }      
            }

            $gallery = null;
            $ext_allowg = ["png","jpg","jpeg","gif","svg"];
            if($request->hasFile("gallery")){
                $fileg = $request->file("gallery");
                $file_gname = time()."_".$fileg->getClientOriginalName();
                $extg = $fileg->getClientOriginalExtension();
                if(in_array($extg,$ext_allowg)){
                    $fileg->move("upload",$file_gname);
                    $gallery = "upload/".$file_gname;
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
                    $filee->move("upload",$file_namee);
                    $thumbnaile = "upload/".$file_namee;
                }      
            }

            $gallerye = null;
            $ext_allowge = ["png","jpg","jpeg","gif","svg"];
            if($request->hasFile("gallerye")){
                $filege = $request->file("gallerye");
                $file_gename = time()."_".$filege->getClientOriginalName();
                $extg = $filege->getClientOriginalExtension();
                if(in_array($extg,$ext_allowge)){
                    $filege->move("upload",$file_gename);
                    $gallerye = "upload/".$file_gename;
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
            $feedBack = DB::table('feedback')->get();
            return view('admin.feedback',['feedback'=>$feedBack]);
    }
    // function order
    public function order()
    {
        $order = DB::table('order')->get();
        return view('admin.order',['order'=>$order]);
    }



    //crop image
//     public function postUpload() //method này để xử lý upload image
//     {
//         $form_data = Input::all();

//         //hiện tại mình validate trong controller, bạn có thể validate trong Request cũng được nhé
//         $validator = Validator::make($form_data, Image::$rules, Image::$messages);

//         if ($validator->fails()) {

//             return Response::json([
//                 'status' => 'error',
//                 'message' => $validator->messages()->first(),
//             ], 200);

//         }

//         $photo = $form_data['img'];

//         $original_name = $photo->getClientOriginalName();
//         $original_name_without_ext = substr($original_name, 0, strlen($original_name) - 4);

//         $filename = $this->sanitize($original_name_without_ext);//mã hóa tên file, mình sẽ comment nó ở phần dưới
//         $allowed_filename = $this->createUniqueFilename( $filename ); //tạo ra file name đảm bảo file name không trùng lặp

//         $filename_ext = $allowed_filename .'.jpg';

//         $manager = new ImageManager();
//         $image = $manager->make( $photo )->encode('jpg')->save(env('UPLOAD_PATH') . $filename_ext );

//         if( !$image) {

//             return Response::json([
//                 'status' => 'error',
//                 'message' => 'Server error while uploading',
//             ], 200);

//         }

// //đây là đoạn xử lý để lưu image vào trong database, nếu image của bạn không có table riêng thì bỏ qua đoạn này nhé
//         // $database_image = new Image;
//         // $database_image->filename      = $allowed_filename;
//         // $database_image->original_name = $original_name;
//         // $database_image->save();

//         // return Response::json([
//         //     'status'    => 'success',
//         //     'url'       => env('URL') . 'uploads/' . $filename_ext,
//         //     'width'     => $image->width(),
//         //     'height'    => $image->height()
//         // ], 200);
//     }


//     public function postCrop()//method này để xử lý crop image
//     {
//         $form_data = Input::all();
//         $image_url = $form_data['imgUrl'];

//         // resized sizes: with và height image
//         $imgW = $form_data['imgW'];
//         $imgH = $form_data['imgH'];
//         // offsets: vị trí của image
//         $imgY1 = $form_data['imgY1'];
//         $imgX1 = $form_data['imgX1'];
//         // crop box: with và height crop
//         $cropW = $form_data['width'];
//         $cropH = $form_data['height'];
//         // rotation angle //image xoay bao nhiêu độ
//         $angle = $form_data['rotation'];

//         $filename_array = explode('/', $image_url);
//         $filename = $filename_array[sizeof($filename_array)-1];

//         $manager = new ImageManager();
//         $image = $manager->make( $image_url );
//         $image->resize($imgW, $imgH)
//             ->rotate(-$angle)
//             ->crop($cropW, $cropH, $imgX1, $imgY1)
//             ->save(env('UPLOAD_PATH') . 'cropped-' . $filename);

//         if( !$image) {

//             return Response::json([
//                 'status' => 'error',
//                 'message' => 'Server error while uploading',
//             ], 200);

//         }

//         return Response::json([
//             'status' => 'success',
//             'url' => env('URL') . 'uploads/cropped-' . $filename
//         ], 200);

//     }


//     private function sanitize($string, $force_lowercase = true, $anal = false)
//     {//method này để mã hóa image, chuyển những ký tự đặt biệt về ký tự "-" hay ""
//         $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
//             "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
//             "â€”", "â€“", ",", "<", ".", ">", "/", "?");
//         $clean = trim(str_replace($strip, "", strip_tags($string)));
//         $clean = preg_replace('/\s+/', "-", $clean);
//         $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

//         return ($force_lowercase) ?
//             (function_exists('mb_strtolower')) ?
//                 mb_strtolower($clean, 'UTF-8') :
//                 strtolower($clean) :
//             $clean;
//     }


//     private function createUniqueFilename( $filename )
//     {//tạo ra image unique
//         $upload_path = env('UPLOAD_PATH');
//         $full_image_path = $upload_path . $filename . '.jpg';

//         if ( File::exists( $full_image_path ) )
//         {
//             // Generate token for image
//             $image_token = substr(sha1(mt_rand()), 0, 5);
//             return $filename . '-' . $image_token;
//         }

//         return $filename;
//     }
}   