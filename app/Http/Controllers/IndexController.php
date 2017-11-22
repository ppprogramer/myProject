<?php

namespace App\Http\Controllers;

use App\Models\RollPicture;

class IndexController extends Controller
{
    public function index()
    {
        $img = RollPicture::select(['name'])->where('status', 1)->orderBy('id', 'desc')->get()->take(5);
        if ($img->isNotEmpty()) {
            $img = collect($img->toArray())->flatten(1)->toArray();
        }
        return view('index', ['img' => $img]);
    }
}
