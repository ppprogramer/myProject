<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RollPicture extends Model
{
    protected $table = 'roll_picture';

    protected $fillable = ['name', 'index', 'status', 'create_timestamp'];
}
