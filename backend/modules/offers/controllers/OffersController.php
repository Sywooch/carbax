<?php

namespace backend\modules\offers\controllers;

use common\classes\SendingMessages;
use common\models\db\Offers;
use common\models\db\User;
use Yii;
use backend\modules\offers\models\OffersModels;
use backend\modules\offers\models\OffersModelsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OffersController implements the CRUD actions for OffersModels model.
 */
class OffersController extends Controller
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
        ];
    }

    /**
     * Lists all OffersModels models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OffersModelsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OffersModels model.
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
     * Creates a new OffersModels model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OffersModels();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing OffersModels model.
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
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing OffersModels model.
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
     * Finds the OffersModels model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OffersModels the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OffersModels::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionEdit_status(){
        Offers::updateAll(['status' => $_POST['status']],['id' => $_POST['id']]);

        $offers = Offers::find()->where(['id' => $_POST['id']])->one();

        if($_POST['status'] == 1){
            $subject = "Спецпредложение опубликовано";
            $msg = $this->renderPartial('y_moder',['offers'=>$offers]);

            SendingMessages::send_message($offers->user_id,Yii::$app->user->id,$subject,$msg);
            Yii::$app->mailer->compose('y_moder_offers',['offers'=>$offers])
                ->setTo(User::getEmail($offers->user_id))
                ->setFrom('admin@carbax.ru')
                ->setSubject($subject)
                ->setTextBody($msg)
                ->send();
        }
        else{
            $subject = "Спецпредложение не опубликовано";
            $msg = $this->renderPartial('n_moder',['offers'=>$offers]);
            SendingMessages::send_message($offers->user_id,Yii::$app->user->id,$subject,$msg);
            Yii::$app->mailer->compose('n_moder_offers',['offers'=>$offers])
                ->setTo(User::getEmail($offers->user_id))
                ->setFrom('admin@carbax.ru')
                ->setSubject($subject)
                ->setTextBody($msg)
                ->send();
        }


    }
}
