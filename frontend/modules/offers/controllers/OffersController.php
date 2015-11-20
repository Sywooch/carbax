<?php



namespace frontend\modules\offers\controllers;

use common\classes\Debug;
use common\models\db\GeobaseCity;
use common\models\forms\OffersForm;
use Yii;
use common\models\db\Offers;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;



class OffersController extends Controller
{
    public $layout = 'page';

    public function actionIndex()
    {
        /*$this->view->params['officeHide'] = true;
        $this->view->params['bannersHide'] = true;*/
        $query = Offers::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->pageSize = 8;
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)

            ->all();
        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }
    public function actionCreate()
    {

        /*$this->view->params['officeHide'] = true;
        $this->view->params['bannersHide'] = true;*/
        $model = new Offers();

        if ($model->load(Yii::$app->request->post() )&& $model->validate()) {
            $model->dt_add = time();
            move_uploaded_file($_FILES['Offers']['tmp_name']['img_url'], Yii::$app->basePath.'/web/media/img/offers/'.time().$_FILES['Offers']['name']['img_url']);
            $model->img_url = '/frontend/web/media/img/offers/'.time().$_FILES['Offers']['name']['img_url'];
            $model->city_id = $_POST['city'];
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionView($id)
    {
        /*$this->view->params['officeHide'] = true;
        $this->view->params['bannersHide'] = true;*/
        $model = Offers::findOne($id);
        return $this->render('view', [
            'model' => $model
        ]);
    }
    public function actionGet_city()
    {
        $city = GeobaseCity::find()->where(['region_id'=>$_POST['region_id']])->all();
        echo Html::label('Город');
        echo Html::dropDownList('city', 0, ArrayHelper::map($city, 'id', 'name'),['prompt'=>'Выберите город']);
    }
}
