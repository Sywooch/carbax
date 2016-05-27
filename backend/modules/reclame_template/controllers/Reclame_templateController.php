<?php

namespace backend\modules\reclame_template\controllers;

use common\models\db\ReclameZone;
use Yii;
use backend\modules\reclame_template\models\ReclameTemplate;
use backend\modules\reclame_template\models\ReclameTemplateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Reclame_templateController implements the CRUD actions for ReclameTemplate model.
 */
class Reclame_templateController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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
     * Lists all ReclameTemplate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReclameTemplateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ReclameTemplate model.
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
     * Creates a new ReclameTemplate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ReclameTemplate();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {

            $zone = ReclameZone::find()->all();

            return $this->render('create', [
                'model' => $model,
                'zone' => $zone,
            ]);
        }
    }

    /**
     * Updates an existing ReclameTemplate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            $zone = ReclameZone::find()->all();
            return $this->render('update', [
                'model' => $model,
                'zone' => $zone,
            ]);
        }
    }

    /**
     * Deletes an existing ReclameTemplate model.
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
     * Finds the ReclameTemplate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ReclameTemplate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ReclameTemplate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
