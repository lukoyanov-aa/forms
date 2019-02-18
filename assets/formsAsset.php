<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\forms\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class formsAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    public $baseUrl = '@web';
    //public $sourcePath = '@webAsset';
    // путь к директории, содержимое которой надо опубликовать
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
