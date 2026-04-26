<?php

namespace frontend\assets;


use yii\web\AssetBundle;

class ZayAsset extends AssetBundle
{
    public $basePath = '@webroot/zay';
    public $baseUrl = '@web/zay';
    public $css = [
        'css/bootstrap.min.css',
        'css/templatemo.css',
        'css/custom.css',
        'css/fontawesome.min.css',
    ];
    public $js = [
        'js/jquery-1.11.0.min.js',
        'js/jquery-migrate-1.2.1.min.js',
        'js/bootstrap.bundle.min.js',
        'js/templatemo.js',
        'js/custom.js',
    ];
}

?>