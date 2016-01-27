<?php

namespace backend\modules\adsmanager\controllers;

use common\classes\SendingMessages;
use common\models\db\Market;
use common\models\db\User;
use Yii;
use backend\modules\adsmanager\models\Adsmanager;
use backend\modules\adsmanager\models\AdsmanagerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdsmanagerController implements the CRUD actions for Adsmanager model.
 */
class AdsmanagerController extends Controller
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
     * Lists all Adsmanager models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdsmanagerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Adsmanager model.
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
     * Creates a new Adsmanager model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Adsmanager();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Adsmanager model.
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
     * Deletes an existing Adsmanager model.
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
     * Finds the Adsmanager model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Adsmanager the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Adsmanager::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionBlock($id, $page){
        Market::updateAll(['published'=>2], ['id'=>$id]);
        $product = Market::findOne($id);
        $subject = 'Модерация не пройдена';
        $msg = $this->renderPartial('n_moder',['product'=>$product]);

        SendingMessages::send_message($product->user_id,Yii::$app->user->id,$subject,$msg);

        Yii::$app->mailer->compose()
            ->setTo(User::getEmail($product->user_id))
            ->setFrom(isset(Yii::$app->params['adminEmail']) ? Yii::$app->params['adminEmail'] : 'no-reply@example.com')
            ->setSubject($subject)
            ->setTextBody($msg)
            ->send();
        return $this->redirect(['index', 'page'=>$page]);
    }

    public function actionPublish($id, $page){
        Market::updateAll(['published'=>1], ['id'=>$id]);
        $product = Market::findOne($id);
        $subject = 'Модерация пройдена';
        $msg = $this->renderPartial('y_moder',['product'=>$product]);

        SendingMessages::send_message($product->user_id,Yii::$app->user->id,$subject,$msg);

        Yii::$app->mailer->compose()
            ->setTo(User::getEmail($product->user_id))
            ->setFrom(isset(Yii::$app->params['adminEmail']) ? Yii::$app->params['adminEmail'] : 'no-reply@example.com')
            ->setSubject($subject)
            ->setTextBody($msg)
            ->send();
        return $this->redirect(['index', 'page'=>$page]);
    }
}
