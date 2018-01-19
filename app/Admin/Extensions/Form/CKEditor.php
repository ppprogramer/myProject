<?php

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field;

class CKEditor extends Field
{
    public static $js = [
        '/packages/ckeditor/ckeditor.js',
        '/packages/ckfinder/ckfinder.js',
//        '/packages/ckeditor/adapters/jquery.js',
    ];

    protected $view = 'admin.ckeditor';

    public function render()
    {
//        $this->script = "$('textarea.{$this->getElementClass()}').ckeditor();";
        $token = csrf_token();
        $url = url('/packages/ckfinder/ckfinder.html');
        $imageUrl = url('/packages/ckfinder/ckfinder.html?type=Images');
        //$uploadUrl = url('/packages/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files');
        //$imageUploadUrl = url('/packages/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images');
        $uploadUrl = url('admin/upload/image') . '?type=Files&command=QuickUpload&_token=' . $token;
        $imageUploadUrl = url('admin/upload/image') . '?type=Images&command=QuickUpload&_token=' . $token;
        $this->script =
            <<<EOT
                    CKEDITOR.replace('{$this->column}',{
            'filebrowserBrowseUrl': '{$url}',
            'filebrowserImageBrowseUrl' : '{$imageUrl}',
            'filebrowserUploadUrl' :  '{$uploadUrl}',
            'filebrowserImageUploadUrl' : '{$imageUploadUrl}',

        });
EOT;
        return parent::render();
    }
}