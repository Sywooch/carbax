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
use common\models\db\AdditionalFields;
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
        //Добавляем сервис
        //Debug::prn($_POST);
        $service = new Services();
        $service->name = $_POST['title'];
        $service->description = $_POST['text'];
        $service->service_type_id = $_POST['service_type'];
        $service->website = $_POST['website'];
        $service->email = $_POST['mailadress'];
        $service->user_id = Yii::$app->user->id;
        $service->save();

        //Добавляем зоны комфорта
        if(isset($_POST['comfort'])) {
            foreach ($_POST['comfort'] as $zone) {
                $cz = new ServiceComfortZone();
                $cz->service_id = $service->id;
                $cz->comfort_zone_id = $zone;
                $cz->save();
            }
        }
        //Добавляем типы авто
        if(isset($_POST['workWith'])) {
            foreach ($_POST['workWith'] as $autoType) {
                $at = new ServiceAutoType();
                $at->service_id = $service->id;
                $at->auto_type_id = $autoType;
                $at->save();
            }
        }

        //Добавляем телефоны
        if(isset($_POST['phoneNumber'])) {
            foreach ($_POST['phoneNumber'] as $ph) {
                $phone = new Phone();
                $phone->service_id = $service->id;
                $phone->number = $ph;
                $phone->save();
            }
        }

        //Добавляем дополнительные поля
        $groups = ServiceTypeGroup::find()->where(['service_type_id'=>$_POST['service_type']])->all();
        foreach($groups as $group){
            $gr = AddFieldsGroup::find()->where(['id' => $group->add_fields_group_id])->one();
            if(isset($_POST[$gr->label])) {
                foreach ($_POST[$gr->label] as $label) {
                    $saf = new ServiceAddFields();
                    $saf->service_id = $service->id;
                    $saf->add_fields_id = $label;
                    $saf->save();
                }
            }
        }

        //Добавляем время работы
        if(isset($_POST['openTime'])) {
            foreach ($_POST['openTime'] as $openTime) {
                if (isset($openTime['day'])) {
                    $work = new WorkHours();
                    $work->service_id = $service->id;
                    $work->day = $openTime['weekDay'];
                    if (isset($openTime['round'])) {
                        $work->{'24h'} = 1;
                    } else {
                        $work->hours_from = $openTime['from'];
                        $work->hours_to = $openTime['to'];
                    }
                    $work->save();
                }
            }
        }

        //Добавляем адреса
        if($_POST['address']) {
            foreach ($_POST['address'] as $address) {
                $ar = new Address();
                $ar->service_id = $service->id;
                $ar->address = $address;
                $ar->save();
            }
        }
        $serviceTypeId = $_POST['service_type'];
        $service = Services::find()->where(['service_type_id'=>$serviceTypeId])->all();

        return $this->render('my_services',
            [
                'serviceTypeId' => $serviceTypeId,
                'service' => $service,
                'info' => 'Сервис успешно добавлен',
            ]);

    }

    public function actionView_service(){
        $servicId = $_GET['service_id'];
        $servic = Services::find()->where(['id'=>$servicId])->one();
        $servicName = $servic->name;
        $address = Address::find()->where(['service_id'=>$servicId])->all();
        $serviceDescription = $servic->description;
        $workHours = WorkHours::find()->where(['service_id'=>$servicId])->all();
        $servicWS = $servic->website;
        $phone = Phone::find()->where(['service_id'=>$servicId])->all();
        $email = $servic->email;
        $carBrands = BrandCars::find()->all();
        $serviceComfortZone = ServiceComfortZone::find()->where(['service_id'=>$servicId])->all();
        foreach($serviceComfortZone as $cz){
            $comfortZone[] = ComfortZone::find()->where(['id'=>$cz->comfort_zone_id])->one();
        }
        $serviceAutoType = ServiceAutoType::find()->where(['service_id'=>$servicId])->all();
        foreach($serviceAutoType as $st){
            $autoType[] = AutoType::find()->where(['id'=>$st->auto_type_id])->one();
        }

        return $this->render('view',
            [
                'serviceID' => $servicId,
                'serviceName' => $servicName,
                'address' => $address,
                'description' => $serviceDescription,
                'workHours' => $workHours,
                'website' => $servicWS,
                'phone' => $phone,
                'email' => $email,
                'carBrands' => $carBrands,
                'comfortZone' => $comfortZone,
                'autoType' => $autoType,
            ]);
    }

    public function actionDel_service(){
        $servicId = $_GET['service_id'];
        $serviceTypeId = $_GET['service_type'];
        $this->del_service($servicId);
        $service = Services::find()->where(['service_type_id'=>$serviceTypeId])->all();

        return $this->render('my_services',
            [
                'serviceTypeId' => $serviceTypeId,
                'service' => $service,
                'info' => 'Сервис успешно удален',
            ]);
    }

    public function actionSelect_service(){
        $serviceTypes = ServiceType::find()->all();
        return $this->render('select', ['service' => $serviceTypes]);
    }

    public function actionMy_services(){
        $serviceTypeId = $_GET['service_id'];
        $service = Services::find()->where(['service_type_id'=>$serviceTypeId])->all();
        return $this->render('my_services',
            [
                'serviceTypeId'=>$serviceTypeId,
                'service'=>$service,
            ]);
    }

    public function get_group($serviceTypeId){
        $groups = ServiceTypeGroup::find()->where(['service_type_id'=>$serviceTypeId])->all();
        return $this->render('fields_group', ['groups' => $groups]);
    }


    public function del_service($id){
        WorkHours::deleteAll(['service_id'=>$id]);
        Phone::deleteAll(['service_id'=>$id]);
        Address::deleteAll(['service_id'=>$id]);
        ServiceAutoType::deleteAll(['service_id'=>$id]);
        ServiceAddFields::deleteAll(['service_id'=>$id]);
        ServiceAutoType::deleteAll(['service_id'=>$id]);
        ServiceComfortZone::deleteAll(['service_id'=>$id]);
        Services::deleteAll(['id'=>$id]);
    }
}