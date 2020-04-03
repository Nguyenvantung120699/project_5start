<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback_product extends Model
{
    protected $table = 'feedback';

    protected $fillable =['product_id','telephone','customer_name','email','status','rate'];
    public function Products(){
        return $this->hasMany("\App\Product");
    }
}
