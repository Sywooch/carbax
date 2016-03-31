<?php



namespace frontend\modules\offers\controllers;


use common\classes\Address;

use common\classes\Debug;
use common\models\db\Favorites;
use common\models\db\GeobaseCity;
use common\models\db\OffersAttend;
use common\models\db\OffersImages;
use common\models\db\Reviews;
use common\models\db\Services;
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
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'view' => '@frontend/views/site/error',
            ],
        ];
    }

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
                        'actions' => ['view','all_offers'],
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
            /*->offset($pages->offset)
            ->limit($pages->limit)*/
            ->orderBy('dt_add DESC')
            ->all();
        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }
    public function actionCreate()
    {
        $this->view->params['bannersHide'] = true;
        $model = new Offers();
        if ($model->load(Yii::$app->request->post() )&& $model->validate()) {
            $region = '';
            $city = '';
            $adsressService = [];
            foreach ($_POST['addressId'] as $adServ) {
                $service = \common\models\db\Address::find()->where(['id'=>$adServ])->one();
                $adsressService[$service->service_id][] = $adServ;
                $region .= $service->region_id.',';
                $city .= $service->city_id.',';
            }
            $model->dt_add = time();
            //move_uploaded_file($_FILES['Offers']['tmp_name']['img_url'], Yii::$app->basePath.'/web/media/img/offers/'.time().$_FILES['Offers']['name']['img_url']);
            $model->img_url = '/frontend/web/media/img/offers/'.time().$_FILES['Offers']['name']['img_url'];
            $model->user_id = Yii::$app->user->id;
            $model->address_selected = json_encode($adsressService);

            $model->region_id = $region;
            $model->city_id = $city;

            $serviseIdStr = '';
            $serviceTypeId = '';
            foreach ($_POST['servisesId'] as $str) {
                $serviseIdStr .= $str.',';
                $serviceTypeId .= Services::find()->where(['id'=>$str])->one()->service_type_id.',';
            }

            $model->service_type_id = $serviceTypeId;
            $model->service_id_str = $serviseIdStr;


            $model->status = 0;
            //Debug::prn($_POST);
            //$model->new_price = $
            $model->save();
            //Debug::prn($model);
            OffersImages::updateAll(['offers_id' => $model->id], ['offers_id' => 99999, 'user_id' => Yii::$app->user->id]);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $services = Services::find()->where(['user_id' => Yii::$app->user->id])->all();

            return $this->render('create', [
                'model' => $model,
                'services' => $services,
            ]);
        }
    }
    public function actionView($id)
    {
        /*$this->view->params['officeHide'] = true;*/
        $this->view->params['bannersHide'] = true;
        $model = Offers::find()
            ->leftJoin('offers_images', '`offers_images`.`offers_id` = `offers`.`id`')
            ->where(['`offers`.`id`' => $id])
            ->with('offers_images')
            ->one();
//Debug::prn($model);
        if(!empty($model)) {
        //$images = OffersImages::find()->where(['offers_id'=>$id])->all();
        $result = [];
        $serviseInfo = json_decode($model->address_selected,true);
       // Debug::prn($serviseInfo);
        $i = 0;
        foreach ($serviseInfo as $serId=>$addId) {
            $result[$i] = Services::find()
                ->select(' `services`.*, `address`.`id` AS address_id ')
                ->leftJoin('work_hours','`work_hours`.`service_id` = `services`.`id`')
                ->leftJoin('address','`address`.`service_id` = `services`.`id`')
                ->leftJoin('phone','`phone`.`service_id` = `services`.`id`')
                ->where(['`address`.`id`'=> $addId, '`services`.`id` '=> $serId])
                ->with('work_hours','address','phone')
               // Debug::prn($result[$i]->createCommand()->rawSql);
                ->all();
            $i++;
        }

        $decisonY = OffersAttend::find()->where(['offers_id' => $_GET['id'], 'decison' => '1'])->count();
        $decisonN = OffersAttend::find()->where(['offers_id' => $_GET['id'], 'decison' => '0'])->count();
        $countReviews = Reviews::find()->where(['publ' => 1, 'offers' => 1, 'spirit_id' => $_GET['id']])->count();
        $favorites = Favorites::find()->where(['offers_id'=>$_GET['id'],'user_id'=>Yii::$app->user->id])->one()->id;


            return $this->render('view', [
                'model' => $model,
                'info' => $result,
                'servicesInfo' => $serviseInfo,
                'decisonY' => $decisonY,
                'decisonN' => $decisonN,
                'countReviews' => $countReviews,
                'favorites' => $favorites,
            ]);
        }
        else{
           // Debug::prn($model);
            //Yii::$app->response->statusCode = 404;
            //throw new \yii\web\NotFoundHttpException("Your Error Message.");
            //throw new NotFoundHttpException;
            /*$exception = Yii::$app->errorHandler->exception;
            Debug::prn($exception);*/
            return $this->render('@frontend/views/site/error',['exception' => 404, 'name' => 'Oooops...']);


        }
    }
    public function actionGet_city()
    {
        $city = GeobaseCity::find()->where(['region_id'=>$_POST['region_id']])->all();
        echo Html::label('Город');
        echo Html::dropDownList('city', 0, ArrayHelper::map($city, 'id', 'name'),['prompt'=>'Выберите город','class'=>'form-control']);
    }

    public function actionEdit($id){
       // Debug::prn($_POST);
        $this->view->params['bannersHide'] = true;
        $model = Offers::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $region = '';
            $city = '';
            $adsressService = [];
            foreach ($_POST['addressId'] as $adServ) {
                $service = \common\models\db\Address::find()->where(['id'=>$adServ])->one();
                $adsressService[$service->service_id][] = $adServ;
                $region .= $service->region_id.',';
                $city .= $service->city_id.',';
            }
            $model->dt_add = time();
            //move_uploaded_file($_FILES['Offers']['tmp_name']['img_url'], Yii::$app->basePath.'/web/media/img/offers/'.time().$_FILES['Offers']['name']['img_url']);
            $model->img_url = '/frontend/web/media/img/offers/'.time().$_FILES['Offers']['name']['img_url'];
            $model->user_id = Yii::$app->user->id;
            $model->address_selected = json_encode($adsressService);

            $model->region_id = $region;
            $model->city_id = $city;

            $serviseIdStr = '';
            $serviceTypeId = '';
            foreach ($_POST['servisesId'] as $str) {
                $serviseIdStr .= $str.',';
                $serviceTypeId .= Services::find()->where(['id'=>$str])->one()->service_type_id.',';
            }

            $model->service_type_id = $serviceTypeId;
            $model->service_id_str = $serviseIdStr;


            $model->status = 0;
            //Debug::prn($model);
            $model->save();

            OffersImages::updateAll(['offers_id' => $model->id], ['offers_id' => 99999, 'user_id' => Yii::$app->user->id]);
            return $this->redirect(['view', 'id' => $model->id]);

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $services = Services::find()->where(['user_id' => Yii::$app->user->id])->all();
            $img = OffersImages::find()->where(['offers_id' => $id])->all();
            return $this->render('edit',
                [
                    'model'=>$model,
                    'services' => $services,
                    'img' => $img,
                ]);
        }
    }

    public function actionDelete($id){
        $model = new Offers();
        $model->deleteAll(['id'=>$id]);

        OffersAttend::deleteAll(['offers_id' => $id]);
        OffersImages::deleteAll(['offers_id' => $id]);

        return $this->redirect(['index']);
    }



    public function actionAll_offers($id){
        $this->view->params['officeHide'] = false;
        $this->view->params['bannersHide'] = true;

        $address = Address::get_geo_info();
        $pagination = new Pagination([
            'defaultPageSize' => 9,
            'totalCount' => Offers::find()->where(['status'=>1])->count(),
        ]);
        if($id !=0){
            $serviceType = ServiceType::find()->filterWhere(['id' => $id])->one();

            $offers = Offers::find()
                ->leftJoin('`offers_images`','`offers_images`.`offers_id` = `offers`.`id`')
                ->where(['LIKE', 'region_id', $address['region_id'].','])
                ->andWhere(['LIKE', 'service_type_id', $id.','])
                ->andWhere(['status'=>1])
                ->orderBy('dt_add DESC')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->with('offers_images')
                ->all();
        }else{
            $offers = Offers::find()
                ->leftJoin('`offers_images`','`offers_images`.`offers_id` = `offers`.`id`')
                ->where(['LIKE', 'region_id', $address['region_id']])
                ->andWhere(['status'=>1])
                ->orderBy('dt_add DESC')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->with('offers_images')
                ->all();
        }


        return $this->render('all_offers',
            [
                'offers' => $offers,
                'serviceType' => $serviceType,
                'pagination' => $pagination,
            ]);

    }

}
