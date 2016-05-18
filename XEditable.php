<?php
namespace kak\widgets\editable;

class XEditable extends \yii\widgets\InputWidget
{
    const MODE_POPUP = 'popup';
    const MODE_INLINE = 'inline';

    public $type;
    public $mode;

    public function init()
    {
        parent::init();
        $this->registerAssetBundle();
    }

    private function registerAssetBundle()
    {
        $view = $this->getView();
        \kak\widgets\editable\EditableAsset::register($view);
    }

    public function run()
    {

    }



}