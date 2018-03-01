<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = ['order_no', 'status', 'price', 'product_id', 'create_time'];
}
