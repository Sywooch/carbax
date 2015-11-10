<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 02.10.2015
 * Time: 7:57
 */

namespace frontend\modules\services\controllers;


use common\classes\Debug;
use common\models\db\AddFieldsGroup;
use common\models\db\Address;
use common\models\db\AutoType;
use common\models\db\BrandCars;
use common\models\db\ComfortZone;
use common\models\db\Phone;
use common\models\db\ServiceAddFields;
use common\models\db\ServiceAutoType;
use common\models\db\ServiceComfortZone;
use common\models\db\Services;
use common\models\db\ServiceType;
use common\models\db\ServiceTypeGroup;
use common\models\db\WorkHours;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

class ServicesController extends Controller
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

    public function actionAdd(){
        $brandCars = BrandCars::find()->all();
        $this->view->params['bannersHide'] = false;
        return $this->render('add', ['brands' => $brandCars]);
    }

    public function actionAdd_to_sql(){
        //Debug::prn($_POST);
        //Добавляем сервис
        $service = new Services();
        $service->name = $_POST['title'];
        $service->description = $_POST['text'];
        $service->service_type_id = $_POST['service_type'];
        $service->website = $_POST['website'];
        $service->email = $_POST['mailadress'];
        $service->user_id = Yii::$app->user->id;
        $service->save();

        //Добавляем зоны комфорта
        foreach ($_POST['comfort'] as $zone) {
            $cz = new ServiceComfortZone();
            $cz->service_id = $service->id;
            $cz->comfort_zone_id = $zone;
            $cz->save();
        }

        //Добавляем типы авто
        foreach($_POST['workWith'] as $autoType){
            $at = new ServiceAutoType();
            $at->service_id = $service->id;
            $at->auto_type_id = $autoType;
            $at->save();
        }

        //Добавляем телефоны
       // Debug::prn($_POST['phoneNumber']);
        foreach($_POST['phoneNumber'] as $ph){
            $phone = new Phone();
            $phone->service_id = $service->id;
            $phone->number = $ph;
            $phone->save();
        }

        //Добавляем дополнительные поля
        $groups = ServiceTypeGroup::find()->where(['service_type_id'=>$_POST['service_type']])->all();
        foreach($groups as $group){
            $gr = AddFieldsGroup::find()->where(['id' => $group->add_fields_group_id])->one();
            foreach($_POST[$gr->label] as $label){
                $saf = new ServiceAddFields();
                $saf->service_id = $service->id;
                $saf->add_fields_id = $label;
                $saf->save();
            }
        }

        //Добавляем время работы
        foreach ($_POST['openTime'] as $openTime) {
            if(isset($openTime['day'])){
                $work = new WorkHours();
                $work->service_id = $service->id;
                $work->day = $openTime['weekDay'];
                if(isset($openTime['round'])){
                    $work->{'24h'} = 1;
                }
                else {
                    $work->hours_from = $openTime['from'];
                    $work->hours_to = $openTime['to'];
                }
                $work->save();
            }
        }

        //Добавляем адреса
        foreach ($_POST['address'] as $address) {
            $ar = new Address();
            $ar->service_id = $service->id;
            $ar->address = $address;
            Debug::prn($ar);
            $ar->save();
        }


    }

    public function actionSelect_service(){
        $serviceTypes = ServiceType::find()->all();
        return $this->render('select', ['service' => $serviceTypes]);
    }

    public function actionMy_services(){
        $serviceTypeId = $_GET['service_id'];
        return $this->render('my_services', ['serviceTypeId'=>$serviceTypeId]);
    }

    public function get_group($serviceTypeId){
        $groups = ServiceTypeGroup::find()->where(['service_type_id'=>$serviceTypeId])->all();
        return $this->render('fields_group', ['groups' => $groups]);
    }
}