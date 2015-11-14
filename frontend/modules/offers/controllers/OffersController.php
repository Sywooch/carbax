<?php



namespace frontend\modules\offers\controllers;

use common\classes\Debug;
use common\models\forms\OffersForm;
use Yii;
use frontend\models\Offers;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;


class OffersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionCreate()
    {
        $model = new Offers();
        if (Yii::$app->request->isPost) {
            $model->img_url = UploadedFile::getInstance($model, 'img_url');
            if ($model->upload()) {
                Debug::prn('123');
                return;
            }
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->dt_add = time();
            move_uploaded_file($_FILES['Offers']['tmp_name']['img_url'], Yii::$app->basePath.'/web/media/img/offers/'.$_FILES['Offers']['name']['img_url']);
            Debug::prn($_FILES);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
}
