<?php

namespace backend\modules\request_type\controllers;

use common\classes\Debug;
use common\models\db\AddFieldsGroup;
use common\models\db\RequestAddForm;
use common\models\db\RequestTypeAddForm;
use common\models\db\RequestTypeGroup;
use Yii;
use backend\modules\request_type\models\RequestType;
use backend\modules\request_type\models\RequestTypeSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Request_typeController implements the CRUD actions for RequestType model.
 */
class Request_typeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all RequestType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequestTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RequestType model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RequestType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RequestType();
        $group = AddFieldsGroup::find()->all();
        foreach($group as $g){
            $gr[$g->id] = $g->name;
        }

        $form = RequestAddForm::find()->all();

        foreach ($form as $f ) {
            $fr[$f->id] = $f->name;
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->icon = $_POST['mediaUploadInputFile'];
            $model->save();
            foreach($_POST[group] as $p){
                $stg = new RequestTypeGroup();
                $stg->request_type_id = $model->id;
                $stg->add_fields_group_id = $p;
                $stg->save();
            }
            foreach ($_POST['formType'] as $frt ) {
                $rf = new RequestTypeAddForm();
                $rf->request_type_id = $model->id;
                $rf->add_form_id = $frt;
                $rf->save();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'group' => $gr,
                'form' => $fr,
            ]);
        }
    }

    /**
     * Updates an existing RequestType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $group = AddFieldsGroup::find()->all();
        foreach($group as $g){
            $gr[$g->id] = $g->name;
        }

        $selected = RequestTypeGroup::find()->where(['request_type_id'=>$id])->all();
        foreach($selected as $s){
            $sel[] = $s->add_fields_group_id;
        }

        $form = RequestAddForm::find()->all();

        foreach ($form as $f ) {
            $fr[$f->id] = $f->name;
        }

        $selForm = RequestTypeAddForm::find()->where(['request_type_id'=>$id])->all();
        foreach ($selForm as $sf) {
            $selF[$sf->add_form_id] = $sf->add_form_id;
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->icon = $_POST['mediaUploadInputFile'];
            $model->save();
            RequestTypeGroup::deleteAll(['request_type_id'=>$model->id]);
            RequestTypeAddForm::deleteAll(['request_type_id'=>$model->id]);
            foreach($_POST[group] as $p){
                $stg = new RequestTypeGroup();
                $stg->request_type_id = $model->id;
                $stg->add_fields_group_id = $p;
                $stg->save();
            }
            foreach ($_POST['formType'] as $frt ) {
                $rf = new RequestTypeAddForm();
                $rf->request_type_id = $model->id;
                $rf->add_form_id = $frt;
                $rf->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'group' => $gr,
                'selected' => $sel,
                'formType' => $fr,
                'selForm' =>  $selF,
            ]);
        }
    }

    /**
     * Deletes an existing RequestType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RequestType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RequestType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RequestType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
