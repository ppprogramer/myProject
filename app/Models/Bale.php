<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bale extends Model
{
    protected $table = 'bale';

    protected $fillable = ['status', 'type', 'key', 'user_id', 'shop_id', 'create_time'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
