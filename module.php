<?php

namespace app\modules\forms;

use Yii;

/**
 * b24 module definition class
 */
class module extends \yii\base\Module {

    public $controllerNamespace = 'app\modules\forms\controllers';

    public function init() {
        parent::init();
        \Yii::configure($this, require __DIR__ . '/config.php');
        $this->layout = 'main';
        $this->setAliases([
            '@webFormsAsset' => '@web' . '/forms/assets/web', //не используется
        ]);
    }

}
