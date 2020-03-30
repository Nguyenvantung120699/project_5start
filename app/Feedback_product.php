<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback_product extends Model
{
    protected $table = 'feedback';

    protected $fillable =['customer_name','email','status'];
}
