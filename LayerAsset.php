<?php

namespace toxufe\layer;

use Yii;
use yii\web\JqueryAsset;

class LayerAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/toxufe/layer/assets/layer-v3.0.3/layer/';

    public $js = [
        'layer.js',
    ];

    public $css = [
    ];

    public function init()
    {
        parent::init();

        $this->depends[] = JqueryAsset::className();
    }


}