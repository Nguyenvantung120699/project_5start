<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback_product extends Model
{
    protected $table = 'feedback';

    protected $fillable =['product_id','user_id','customer_name','email','status'];
}
