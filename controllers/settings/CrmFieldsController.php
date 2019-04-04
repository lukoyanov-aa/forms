<?php

namespace app\modules\forms\controllers\settings;

use Yii;
use app\modules\forms\models\settings\CrmFields;
use app\modules\forms\models\settings\FormFields;
use app\modules\forms\models\settings\CrmFieldsSearch;
use app\modules\forms\controllers\AdminSecondController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FormsFieldsController implements the CRUD actions for CrmFields model.
 */
class CrmFieldsController extends AdminSecondController {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CrmFields models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CrmFieldsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CrmFields model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CrmFields model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($form_id = null, $field_type = null) {
        if (!$form_id and ! $field_type and ! ($field_type == 'lead' or $field_type == 'deal')) {
            throw new HttpException(404);
        }

        $request = Yii::$app->request;
        $model = new CrmFields();
        $formFieldModel = new FormFields();
        $formField = $formFieldModel->find()->where(['iform_id' => $form_id])->orWhere(['iform_id' => 0])->all();
        //Yii::warning($formField->find()->all());

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //'turn/managers/view', 'id'=>$imanagers_id

            return $this->redirect(['settings/forms/view', 'id' => $model->iforms_id, 'tab' => $model->ctype]);
        } else {
            if ($request->post('action') != 'submit') {
                $model->iforms_id = $form_id;
                $model->ctype = $field_type;
            }
            $session = Yii::$app->session;
            $AccessParams = $session->get('AccessParams');
            $component = new \app\components\b24Tools();
            $b24App = $component->connect($this->moduleParams['applicationId'], $this->moduleParams['applicationSecret'], $this->moduleParams['b24PortalTable'], null, $this->moduleParams['applicationScope'], $AccessParams);
            $fieldsList = [];
            switch ($model->ctype) {
                case 'lead':
                    $obB24Lead = new \Bitrix24\CRM\Lead($b24App);
                    $leadFields = $obB24Lead->fields();
                    $fieldsList = $this->fieldsList($leadFields['result']);
                    break;
                case 'deal':
                    $obB24Deal = new \Bitrix24\CRM\Deal\Deal($b24App);
                    $dealFields = $obB24Deal->fields();
                    $fieldsList = $this->fieldsList($dealFields['result']);
                    break;
            }
            return $this->render('create', [
                        'model' => $model,
                        'fieldsList' => $fieldsList,
                        'formField' => $formField
            ]);
        }
    }

    private function fieldsList($arr) {
        $res = [];
        foreach ($arr as $key => $value) {
            //if ($value['type'] == 'string' and ! $value['isMultiple']) {
            if (stripos($key, 'UF_CRM') !== false and $value['type'] == 'string' or $value['type'] == 'date' or stripos($key, 'COMMENTS') !== false) {
                if (stripos($key, 'UF_CRM') === false) {
                    array_push($res, [
                        'id' => $key,
                        'title' => $value['title'],
                        'type' => $value['type']
                    ]);
                    //$res[$key] = $value['title'];
                } else {
                    //$res[$key] = $value['formLabel'];
                    array_push($res, [
                        'id' => $key,
                        'title' => $value['formLabel'],
                        'type' => $value['type']
                    ]);
                }
            }
        }
        return $res;
    }

    /**
     * Updates an existing CrmFields model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $formFieldModel = new FormFields();
        $formField = $formFieldModel->find()->indexBy('iid')->where(['iform_id' => $model->iforms_id])->orWhere(['iform_id' => 0])->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['settings/forms/view', 'id' => $model->iforms_id, 'tab' => $model->ctype]);
        } else {
            $session = Yii::$app->session;
            $AccessParams = $session->get('AccessParams');
            $component = new \app\components\b24Tools();
            $b24App = $component->connect($this->moduleParams['applicationId'], $this->moduleParams['applicationSecret'], $this->moduleParams['b24PortalTable'], null, $this->moduleParams['applicationScope'], $AccessParams);
            $fieldsList = [];
            switch ($model->ctype) {
                case 'lead':
                    $obB24Lead = new \Bitrix24\CRM\Lead($b24App);
                    $leadFields = $obB24Lead->fields();
                    $fieldsList = $this->fieldsList($leadFields['result']);
                    break;
                case 'deal':
                    $obB24Deal = new \Bitrix24\CRM\Deal\Deal($b24App);
                    $dealFields = $obB24Deal->fields();
                    $fieldsList = $this->fieldsList($dealFields['result']);
                    break;
            }

            //Yii::warning($fieldsList);
//            $obB24Users = new \Bitrix24\User\User($b24App);
//            $b24users = $obB24Users->get('ID', '', ['ACTIVE' => true]);
//            $usersList = $this->usersList($b24users);
            return $this->render('update', [
                        'model' => $model,
                        'fieldsList' => $fieldsList,
                        'formField' => $formField
            ]);
        }
    }

    /**
     * Deletes an existing CrmFields model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $form_id, $tab = null) {
        $this->findModel($id)->delete();

        return $this->redirect(['settings/forms/view', 'id' => $form_id, 'tab' => $tab]);
    }

    /**
     * Finds the CrmFields model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CrmFields the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = CrmFields::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
