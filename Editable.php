<?php
namespace kak\widgets\editable;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

class Editable extends \yii\widgets\InputWidget
{
    const JS_KEY = 'kak/editable/';


    const MODE_POPUP = 'popup';
    const MODE_INLINE = 'inline';

    public $mode = self::MODE_POPUP;

    public $type = 'text';
    public $url;

    public $options = [];
    public $ajaxOptions;
    public $clientOptions = [];


    public function init()
    {
        parent::init();
        $this->prepareOptions();
        $this->registerAssetBundle();
    }

    protected function registerAssetBundle()
    {
        $view = $this->getView();
        EditableAsset::register($view);
    }

    protected function prepareOptions()
    {

    }

    public function run()
    {
        $id   = $this->options['id'];
        $view = $this->getView();
        $clientOptions = Json::htmlEncode($this->clientOptions);

        $this->view->registerJs("jQuery('#".$id."').editable(".$clientOptions.");", $view::POS_READY, self::JS_KEY . $id);


    }

    protected function boolToStr($var)
    {
        return $var===true ? 'true' : 'false';
    }

}