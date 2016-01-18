<?php

namespace backend\modules\service_type\controllers;

use common\classes\Debug;
use common\models\db\AddFieldsGroup;
use common\models\db\Services;
use common\models\db\ServiceTypeGroup;
use common\models\forms\IconsForm;
use Yii;
use common\models\db\ServiceType;
use backend\modules\service_type\models\ServiceTypeSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * Service_typeController implements the CRUD actions for ServiceType model.
 */
class Service_typeController extends Controller
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
            /*'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],*/
        ];
    }

    /**
     * Lists all ServiceType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServiceTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServiceType model.
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
     * Creates a new ServiceType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ServiceType();
        $group = AddFieldsGroup::find()->all();
        $icon = new IconsForm();

        foreach($group as $g){
            $gr[$g->id] = $g->name;
        }

        if ($model->load(Yii::$app->request->post())) {

            // Загрузка иконки
           /* if($icon->load(Yii::$app->request->post())){
                $file = UploadedFile::getInstance($icon, 'icon_s');
                $file->saveAs('icons/' . $file->baseName . '.' . $file->extension);
                $model->icon = 'icons/' . $file->baseName . '.' . $file->extension;
            }*/
            //
            $model->icon = $_POST['mediaUploadInputFile'];
            $model->save();
            foreach($_POST[group] as $p){
                $stp = new ServiceTypeGroup();
                $stp->service_type_id = $model->id;
                $stp->add_fields_group_id = $p;
                $stp->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'group' => $gr,
                'icon' => $icon,
            ]);
        }
    }

    /**
     * Updates an existing ServiceType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $icon = new IconsForm();

        $group = AddFieldsGroup::find()->all();
        foreach($group as $g){
            $gr[$g->id] = $g->name;
        }

        $selected = ServiceTypeGroup::find()->where(['service_type_id'=>$id])->all();
        foreach($selected as $s){
            $sel[] = $s->add_fields_group_id;
        }

        //Debug::prn('<br><br><br><br><br>');
        //Debug::prn($selected);
        if ($model->load(Yii::$app->request->post())) {

            // Загрузка иконки
            /*if($icon->load(Yii::$app->request->post())){
                $file = UploadedFile::getInstance($icon, 'icon_s');
                $file->saveAs('icons/' . $file->baseName . '.' . $file->extension);
                $model->icon = 'icons/' . $file->baseName . '.' . $file->extension;
            }*/
            //
            $model->icon = $_POST['mediaUploadInputFile'];
            $model->save();
            $delServiceTypeGroup = new ServiceTypeGroup();
            $delServiceTypeGroup->deleteAll(['service_type_id'=>$id]);
            foreach($_POST[group] as $p){
                $stp = new ServiceTypeGroup();
                $stp->service_type_id = $model->id;
                $stp->add_fields_group_id = $p;
                $stp->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'group' => $gr,
                'selected' => $sel,
                'icon' => $icon,
            ]);
        }
    }

    /**
     * Deletes an existing ServiceType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        Services::deleteAll(['service_type_id'=>$id]);
        ServiceTypeGroup::deleteAll(['service_type_id'=>$id]);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ServiceType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ServiceType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ServiceType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
