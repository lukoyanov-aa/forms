<?php

namespace app\modules\forms\assets;

use yii\web\AssetBundle;

class ModuleAsset extends AssetBundle

{
    public $baseUrl = '@web';
    public $sourcePath = '@app/modules/forms/assets/web/';
    public $css = [
        'https://fonts.googleapis.com/css?family=Roboto:400,500,700',
    ];
    public $js = [        
        'js/application.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
