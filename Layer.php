<?php

namespace toxufe\layer;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\widgets\MaskedInput;

class Layer extends \yii\bootstrap\Widget
{
    public $clientOptions = [];
    //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）});
    public $anim = 0;
    public $path;
    public $title;
    public $thumb_path;

    public function init()
    {
        parent::init();

        $this->options = array_merge([
            'src'       => $this->thumb_path,
            'layer-src' => $this->path,
            'title'     => $this->title
        ], $this->options);

        $this->clientOptions = array_merge([
            'id' => $this->getId(),
        ], $this->clientOptions);
    }

    protected function renderInput()
    {

        //<div id="layer-photos-demo" class="layer-photos-demo">
        //<img layer-pid="图片id，可以不写" layer-src="http://res.layui.com/images/fly/fly.jpg" src="http://res.layui.com/images/fly/fly.jpg" alt="图片名"></div>

        $img = Html::Tag('img', '', $this->options);
        $div = Html::Tag('div', $img, $this->clientOptions);

        return $div;
    }

    public function run()
    {
        parent::run();
        LayerAsset::register($this->view);
        echo $this->renderInput();
        $js = 'layer.photos({photos: \'#' . $this->getId() . '\',anim: ' . $this->anim . '});';
        $this->view->registerJs($js);
    }


    protected function getClientOptions()
    {
        return $this->clientOptions;
    }

}