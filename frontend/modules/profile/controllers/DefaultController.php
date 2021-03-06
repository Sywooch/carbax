<?php

namespace frontend\modules\profile\controllers;

use common\classes\Debug;
use common\models\db\Address;
use common\models\db\Garage;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use common\models\db\Market;
use common\models\db\Offers;
use common\models\db\OffersAttend;
use common\models\db\OffersImages;
use common\models\db\Phone;
use common\models\db\ServiceAddFields;
use common\models\db\ServiceAutoType;
use common\models\db\ServiceBrandCars;
use common\models\db\ServiceComfortZone;
use common\models\db\Services;
use common\models\db\ServicesImg;
use common\models\db\ServiceType;
use common\models\db\WorkHours;
use Yii;
use common\models\db\User;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'add_to_sql' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if ($action->id == 'add_to_sql') {
            Yii::$app->controller->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public $layout = 'page';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionEdit_contacts(){
        return $this->render('edit_contacts',
            [
                'user' => User::find()->where(['id'=>Yii::$app->user->id])->one(),
                'regions' => GeobaseRegion::find()->orderBy('name')->all(),
                'cities' => GeobaseCity::find()->all(),
            ]);
    }

    public function actionAdd_to_sql(){
        $user = User::findOne(Yii::$app->user->id);
        if(!empty($_FILES['file']['name'])){
            if(!file_exists('media/users/'.Yii::$app->user->id)){
                mkdir('media/users/'.Yii::$app->user->id.'/');
            }
            if(!file_exists('media/users/'.Yii::$app->user->id.'/'.date('Y-m-d'))){
                mkdir('media/users/'.Yii::$app->user->id.'/'.date('Y-m-d'));
            }
            $dir = 'media/users/'.Yii::$app->user->id.'/'.date('Y-m-d').'/';

            move_uploaded_file($_FILES['file']['tmp_name'], $dir.$_FILES['file']['name']);
            $user->avatar = $dir.$_FILES['file']['name'];
        }
        $user->name = $_POST['name'];
        $user->last_name = $_POST['last_name'];
        $user->email = $_POST['email'];
        $user->telephon = $_POST['telephon'];
        $user->skype = $_POST['skype'];
        $user->icq = $_POST['icq'];
        $user->link_vk = $_POST['link_vk'];
        $user->region_id = $_POST['regions'];
        $user->city_id = $_POST['city_widget'];
        if(!empty($_POST['passwordUserEdit'])){
            $user->setPassword($_POST['passwordUserEdit']);
        }
        $user->save();
        Yii::$app->session->setFlash('success','Информация успешно обновлена');
        return $this->render('edit_contacts',
            [
                'user' => User::find()->where(['id'=>Yii::$app->user->id])->one(),
            ]);
    }

    public function actionView($id = null){
        $userId = ($id == null) ? Yii::$app->user->id : $id;

        $user = User::find()->where(['id' => $userId])->one();
        $serviceType = ServiceType::find()
            ->leftJoin('`services`','`services`.`service_type_id` = `service_type`.`id`')
            ->where(['`services`.`user_id`'=>$user->id])
            ->all();
        $autoGarage = Garage::find()
            ->leftJoin('`auto_widget`', '`auto_widget`.`id` = `garage`.`id_auto_widget`')
            ->where(['user_id'=>$user->id])
            ->with('auto_widget')
            ->all();
        //Debug::prn($autoGarage[0]->auto_widget[0]->photo);
        //Debug::prn($autoGarage->createCommand()->rawSql);
        //$userBusiness = Services::find()->where(['user_id'=>$user->id])->all();

        return $this->render('view',
            [
                'user' => $user,
                'serviceType' => $serviceType,
                'autoGarage' => $autoGarage,
                //'business' => $userBusiness
            ]);
    }

    public function actionDelete(){
        return $this->render('delete');
    }

    public function actionDel_prof(){
        //Debug::prn(Yii::$app->user->id);
        //$product = Market::find()->where(['user_id' => Yii::$app->user->id])->all();
        Market::deleteAll(['user_id' => Yii::$app->user->id]);

        $offers = Offers::find()->where(['user_id' => Yii::$app->user->id])->all();
        foreach($offers as $offer):
            OffersAttend::deleteAll(['offers_id' => $offer->id]);
            OffersImages::deleteAll(['offers_id' => $offer->id]);
        endforeach;

        Offers::deleteAll(['user_id' => Yii::$app->user->id]);

        $services = Services::find()->where(['user_id' => Yii::$app->user->id])->all();
        foreach($services as $service):

            WorkHours::deleteAll(['service_id'=>$service->id]);
            Phone::deleteAll(['service_id'=>$service->id]);
            Address::deleteAll(['service_id'=>$service->id]);
            ServiceAutoType::deleteAll(['service_id'=>$service->id]);
            ServiceAddFields::deleteAll(['service_id'=>$service->id]);
            ServiceComfortZone::deleteAll(['service_id'=>$service->id]);
            ServiceBrandCars::deleteAll(['service_id'=>$service->id]);
            ServicesImg::deleteAll(['services_id'=>$service->id]);
        endforeach;
        Services::deleteAll(['user_id' => Yii::$app->user->id]);
        //Debug::prn($product);
        User::deleteAll(['id' => Yii::$app->user->id]);
        return $this->redirect(['/']);
    }
}
