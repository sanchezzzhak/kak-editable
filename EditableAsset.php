<?php
namespace kak\widgets\editable;

use yii\web\AssetBundle;

class EditableAsset extends AssetBundle
{
    public $sourcePath = '@bower/x-editable/dist/bootstrap3-editable';
    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public $js = [
        'js/bootstrap-editable.min.js',
    ];

    public $css = [
        'css/bootstrap-editable.css',
    ];

}