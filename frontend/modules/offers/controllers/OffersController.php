<?php



namespace frontend\modules\offers\controllers;

use common\models\forms\OffersForm;
use Yii;
use frontend\models\Offers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class OffersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionCreate()
    {
        $model = new Offers();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->dt_add = time();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
}
