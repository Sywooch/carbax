<?php

namespace backend\modules\service_types\controllers;

use common\classes\Debug;
use common\models\db\AddFieldsGroup;
use Yii;
use backend\modules\service_types\models\Service_types;
use backend\modules\service_types\models\Service_typesSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Service_typesController implements the CRUD actions for Service_types model.
 */
class Service_typesController extends Controller
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
     * Lists all Service_types models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Service_typesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Service_types model.
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
     * Creates a new Service_types model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Service_types();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $group = new AddFieldsGroup();
            $TGroup = $group->find()->all();

            $arr_group[0] = 'Выберите группу';
            foreach ($TGroup as $g) {
                $arr_group[$g->id] = $g->name;
            }


            return $this->render('create', [
                'model' => $model,
                'group' => $arr_group,
            ]);
        }
    }

    /**
     * Updates an existing Service_types model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $group = new AddFieldsGroup();
            $TGroup = $group->find()->all();

            $arr_group[0] = 'Выберите группу';
            foreach ($TGroup as $g) {
                $arr_group[$g->id] = $g->name;
            }

            return $this->render('update', [
                'model' => $model,
                'group' => $arr_group,
            ]);
        }
    }

    /**
     * Deletes an existing Service_types model.
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
     * Finds the Service_types model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Service_types the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Service_types::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
