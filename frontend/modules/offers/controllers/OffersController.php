<?php



namespace frontend\modules\offers\controllers;


use common\classes\Address;

use common\classes\Debug;
use common\models\db\GeobaseCity;
use common\models\db\ServiceType;
use common\models\forms\OffersForm;
use Yii;
use common\models\db\Offers;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;



class OffersController extends Controller
{
    public $layout = 'page';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'send_request' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        /*$this->view->params['officeHide'] = true;
        $this->view->params['bannersHide'] = true;*/
        $query = Offers::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->pageSize = 8;
        $models = $query
            ->where(['user_id' => Yii::$app->user->id])
            ->offset($pages->offset)
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
            $model->user_id = Yii::$app->user->id;
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
        echo Html::dropDownList('city', 0, ArrayHelper::map($city, 'id', 'name'),['prompt'=>'Выберите город','class'=>'form-control']);
    }

    public function actionEdit($id){
       // Debug::prn($_POST);
        $model = Offers::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if(!empty($_FILES['Offers']['tmp_name']['img_url'])){
                move_uploaded_file($_FILES['Offers']['tmp_name']['img_url'], Yii::$app->basePath.'/web/media/img/offers/'.time().$_FILES['Offers']['name']['img_url']);
                $model->img_url = '/frontend/web/media/img/offers/'.time().$_FILES['Offers']['name']['img_url'];
            }
            else{
                $model->img_url = $_POST['img_url_h'];
            }
            $model->city_id = $_POST['city'];
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('edit',['model'=>$model]);
        }
    }

    public function actionDelete($id){
        $model = new Offers();
        $model->deleteAll(['id'=>$id]);

        return $this->redirect(['index']);
    }



    public function actionAll_offers($id = false){
        $this->view->params['officeHide'] = false;
        $this->view->params['bannersHide'] = false;

        $address = Address::get_geo_info();
        if($_GET['id']){
            $serviceType = ServiceType::find()->filterWhere(['id' => $_GET['id']])->one();
        }

        $pagination = new Pagination([
            'defaultPageSize' => 9,
            'totalCount' => Offers::find()->count(),
        ]);

        $offers = Offers::find()
            ->where(['region_id'=>$address['region_id']])
            ->filterWhere(['service_type_id'=>$_GET['id']])
            ->orderBy('dt_add DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('all_offers',
            [
                'offers' => $offers,
                'serviceType' => $serviceType,
                'pagination' => $pagination,
            ]);

    }

}
