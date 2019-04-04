<?php

namespace app\modules\forms\controllers\settings;

use Yii;
use app\modules\forms\models\settings\MailFields;
use app\modules\forms\models\settings\FormFields;
use app\modules\forms\models\settings\MailFieldsSearch;
use app\modules\forms\controllers\AdminSecondController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FormsFieldsController implements the CRUD actions for MailFields model.
 */
class MailFieldsController extends AdminSecondController {

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
        $searchModel = new MailFieldsSearch();
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
    public function actionCreate($form_id = null) {
        if (!$form_id) {
            throw new HttpException(404);
        }

        $request = Yii::$app->request;
        $model = new MailFields();
        $formFieldModel = new FormFields();
        $formField = $formFieldModel->find()->where(['iform_id' => $form_id])->orWhere(['iform_id' => 0])->all();
        //Yii::warning($formField->find()->all());

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //'turn/managers/view', 'id'=>$imanagers_id

            return $this->redirect(['settings/forms/view', 'id' => $model->iforms_id, 'tab' => 'mail']);
        } else {
            if ($request->post('action') != 'submit') {
                $model->iforms_id = $form_id;
                $model->cfields_type = 'string';
            }
            $fieldsList = ['TITLE'=>'Заголовок', 'BODY'=>'Текст письма'];
            return $this->render('create', [
                        'model' => $model,
                        'fieldsList' => $fieldsList,
                        'formField' => $formField
            ]);
        }
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
            return $this->redirect(['settings/forms/view', 'id' => $model->iforms_id, 'tab' => 'mail']);
        } else {
            $fieldsList = ['TITLE'=>'Заголовок', 'BODY'=>'Текст письма'];
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

        return $this->redirect(['settings/forms/view', 'id' => $form_id, 'tab' => 'mail']);
    }

    /**
     * Finds the CrmFields model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CrmFields the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = MailFields::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
