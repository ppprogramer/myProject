<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UploadImageController extends Controller
{
    public function image()
    {
        require_once __DIR__ . '/../../../public/packages/ckfinder/core/connector/php/connector.php';
    }
}
