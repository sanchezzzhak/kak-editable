<?php
namespace kak\widgets\editable;

use yii\web\AssetBundle;

class EditableAsset extends AssetBundle
{
    public $sourcePath = '@vendor/kak/editable/assets';

    public $js = [
        'js/kak-editable.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];


}