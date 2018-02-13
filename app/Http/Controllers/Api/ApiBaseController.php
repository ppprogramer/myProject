<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiBaseController extends Controller
{
    public function output($data = [])
    {
        return $data;
    }
}
