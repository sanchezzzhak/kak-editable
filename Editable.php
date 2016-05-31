<?php
namespace kak\widgets\editable;




use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * Class Editable
 * @package kak\widgets\editable
```php
    Editable::widget([]);

 *
```
 *
 */
class Editable extends \yii\widgets\InputWidget
{
    const JS_KEY = 'kak/editable/';

    const EDIT_TYPE_BUTTON = 'button';
    const EDIT_TYPE_LINK = 'button';

    const MODE_POPUP = 'popup';
    const MODE_INLINE = 'inline';

    public $mode = self::MODE_POPUP;
    public $type = 'text';
    public $url;


    public $clientOptions = [];
    public $options = [];

    public $ajaxOptions;


    /**
     * @see editable
     * @var string
     * Placement of container relative to element. Can be top|right|bottom|left. Not used for inline container.
     */
    public $placement = 'top';
    /**
     * @see editable
     * @var string
     * Text shown when element is empty.
     */
    public $emptytext = 'Empty';
    /**
     * @see editable
     * @var boolean|string
     * Where to show buttons: left(true)|bottom|false
     * Form without buttons is auto-submitted.
     */
    public $showbuttons = 'left';

    /**
     * @see editable
     * @var string
     * Strategy for sending data on server. Can be auto|always|never. When 'auto' data will be sent on server only
     * if pk and url defined, otherwise new value will be stored locally.
     */
    public $send = 'auto';




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
        /**
         * @see Xeditable
         * @see set default url
         */
        $this->url = $this->url ? Url::to($this->url) : 'editable';
        $this->clientOptions['placement'] = $this->placement;
    }


    public function run()
    {
        $id   = $this->id;
        $view = $this->getView();

        $clientOptions = Json::htmlEncode($this->clientOptions);
        $this->view->registerJs("jQuery('#".$id."').editable(".$clientOptions.");", $view::POS_READY, self::JS_KEY . $id);

        Html::addCssClass($this->options['class'],'kak-editable');
        echo Html::beginTag('div',$this->options);
            echo $this->renderInput();
        echo Html::endTag('div');
    }

    protected function boolToStr($var)
    {
        return $var===true ? 'true' : 'false';
    }


    public $emptyText = 'empty';

    public function renderInput()
    {
        $resultHtml = '';
        if($this->hasModel()){

        }
        $resultHtml.= Html::button('empty',['class' => 'kak-editable-click']);
        $resultHtml.=<<<H
        <div class="kak-editable-popover" style="display:none;">
            <div class="kak-popover-title"><i class="glyphicon glyphicon-edit"></i> Popover top  <button class="close">&times</button> </div>
            <div class="kak-popover-content">
                111 ass a
            </div>
        </div>
H;



        return $resultHtml;
    }



}