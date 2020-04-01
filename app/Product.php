<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable =['product_name','product_desc','thumbnail','gallery','category_id','brand_id','price','quantity','status','purchase'];

    const SHOW = 1;
    const HIDE = 0;

    public function Category(){
        return $this->belongsTo("\App\Category");
    }

    public function Brand(){
        return $this->belongsTo("\App\Brand");
    }
    public function Orders(){
        return $this->belongsToMany("\App\Order",'order_product','product_id','order_id');
    }
    public function getPrice(){
        return number_format($this->price,2,',','.');
    }
}
