<?php
namespace app\modules\forms\controllers;
use \yii\web\Controller;
use Yii;
use app\modules\forms\models\b24\B24portal;
/**
 * Description of appController
 *
 * @author Админ
 */
class app24Controller extends Controller {
    
    protected $arB24App;
    private $arAccessParams = array();    
    protected $b24_error = '';
    protected $is_ajax_mode = false;
    protected $is_background_mode = false;    
    protected $moduleParams;    
    protected $b24_action;
    protected $site_b24_action;
    protected $arScope = ['user', 'crm'];
    
    public function beforeAction($action){  
        if($action->id == 'install'){
            $this->enableCsrfValidation = false;            
        } 
        $this->is_ajax_mode = null !== Yii::$app->request->post('operation');
	$this->is_background_mode = null !== Yii::$app->request->post('background');
        
        $this->moduleParams = \Yii::$app->controller->module->params; 
        $this->b24_action = $this->moduleParams['b24_action'];
        $this->site_b24_action = $this->moduleParams['site_b24_action'];
        
        
        if(in_array($action->id, $this->b24_action) or in_array($action->id, $this->site_b24_action)){
            if ($this->is_background_mode or in_array($action->id, $this->site_b24_action)) { 
                $component = new \app\components\b24connector();
                $this->arB24App = $component->connect('doorhankrd.bitrix24.ru', $this->moduleParams['applicationId'], $this->moduleParams['applicationSecret'], $this->arScope);
//                $res = $this->getAuthFromDB(); //Нужно добавить проверку res
//                
//
//                $this->arAccessParams = $this->prepareFromDB($res);
//
//                $this->b24_error = $this->checkB24Auth();
//
//                if ($this->b24_error != '') {
//                    Yii::error('background auth error: '.$this->b24_error);
//                }
//            //\CB24Log::Add('background auth success!');            
            }
            else {
//                if ($this->is_ajax_mode){                    
//                    $this->arAccessParams = $this->prepareFromRequest(Yii::$app->request->post());
//                }
//                else{
//                    $this->arAccessParams = Yii::$app->request->post();
//                }
//                $this->b24_error = $this->checkB24Auth();
            }            
        }
        
        return parent::beforeAction($action);
    }
}
