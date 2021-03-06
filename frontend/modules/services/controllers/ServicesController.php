<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 02.10.2015
 * Time: 7:57
 */

namespace frontend\modules\services\controllers;


use app\models\GeobaseRegion;
use common\classes\Custom_function;
use common\classes\Debug;
use common\models\db\AddFieldsGroup;
use common\models\db\AdditionalFields;
use common\models\db\Address;
use common\models\db\AutoComBrands;
use common\models\db\AutoType;
use common\models\db\BrandCars;
use common\models\db\ComfortZone;
use common\models\db\Favorites;
use common\models\db\GeobaseCity;
use common\models\db\Phone;
use common\models\db\Reviews;
use common\models\db\ServiceAddFields;
use common\models\db\ServiceAutoType;
use common\models\db\ServiceBrandCars;
use common\models\db\ServiceComfortZone;
use common\models\db\Services;
use common\models\db\ServicesImg;
use common\models\db\ServiceType;
use common\models\db\ServiceTypeGroup;
use common\models\db\TofManufacturers;
use common\models\db\WorkHours;
use common\models\User;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?','@'],
                    ],
                    /*[
                        'allow' => true,
                        'actions' => ['view_service'],
                        'roles' => ['?'],
                    ],*/
                    [
                        'allow' => true,
                        'actions' => ['index', 'add', 'add_to_sql', 'edit_service', 'update_to_sql', 'del_service'],
                        'roles' => ['business','admin','root'],
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
        if ($action->id == 'update_to_sql') {
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
        //$brandCars = BrandCars::find()->all();
        $this->view->params['bannersHide'] = false;
        $service =ServiceType::find()->where(['id'=>$_GET['service_type']])->one();
        return $this->render('add', ['service'=>$service]);
    }

    public function actionAdd_to_sql(){
        //Добавляем сервис
        $service = new Services();
        $service->name = $_POST['title'];
        $service->description = $_POST['text'];
        $service->service_type_id = $_POST['service_type'];
        $service->website = $_POST['website'];
        $service->email = $_POST['mailadress'];
        $service->user_id = Yii::$app->user->id;
        $service->dt_add = time();

        if(!file_exists('media/users/'.Yii::$app->user->id)){
            mkdir('media/users/'.Yii::$app->user->id.'/');
        }
        if(!file_exists('media/users/'.Yii::$app->user->id.'/'.date('Y-m-d'))){
            mkdir('media/users/'.Yii::$app->user->id.'/'.date('Y-m-d'));
        }
        $dir = 'media/users/'.Yii::$app->user->id.'/'.date('Y-m-d').'/';
        //move_uploaded_file($_FILES['file']['tmp_name'], $dir.$_FILES['file']['name']);
        $service->photo = $dir.$_FILES['file']['name'];
        //Debug::prn($_FILES);
        $service->save();
        ServicesImg::updateAll(['services_id' => $service->id], ['services_id' => 99999, 'user_id' => Yii::$app->user->id]);
        //Debug::prn($_POST);

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

        //Добавляем марки авто
        if(isset($_POST['brands'])){
            foreach($_POST['brands'] as $br){
                $brC = new ServiceBrandCars();
                $brC->service_id = $service->id;
                $brC->brand_cars_id = $br;
                $brC->type = 1;
                $brC->save();
            }
        }

        if(isset($_POST['brandsCargo'])){
            foreach ($_POST['brandsCargo'] as $brCargo) {
                $brCar = new ServiceBrandCars();
                $brCar->service_id = $service->id;
                $brCar->brand_cars_id = $brCargo;
                $brCar->type = 2;
                $brCar->save();
            }
        }

        if(isset($_POST['brandsMoto'])){
            foreach ($_POST['brandsMoto'] as $brCargo) {
                $brCar = new ServiceBrandCars();
                $brCar->service_id = $service->id;
                $brCar->brand_cars_id = $brCargo;
                $brCar->type = 3;
                $brCar->save();
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
                $ar->address = $address['title'];
                $ar->region_id = $address['regionId'];
                $ar->city_id = $address['cityId'];
                $ar->save();
            }
        }
        $serviceTypeId = $_POST['service_type'];
        $service = Services::find()->where(['service_type_id'=>$serviceTypeId,'user_id'=>Yii::$app->user->id])->all();
        Yii::$app->session->setFlash('success','Сервис успешно добавлен');
        /*return $this->render('my_services',
            [
                'serviceTypeId' => $serviceTypeId,
                'service' => $service,
            ]);*/
        return $this->redirect(['my_services', 'service_type'=>$serviceTypeId]);
    }

    public function actionView_service(){
        $servicId = $_GET['service_id'];
        $servic = Services::find()->where(['id'=>$servicId])->one();
        $servicName = $servic->name;
        $serviceLogo = $servic->photo;
        $address = Address::find()->where(['service_id'=>$servicId])->all();
        $serviceDescription = $servic->description;
        $workHours = WorkHours::find()->where(['service_id'=>$servicId])->all();
        $servicWS = $servic->website;
        $phone = Phone::find()->where(['service_id'=>$servicId])->all();
        $email = $servic->email;
        $carBrands = ServiceBrandCars::find()->where(['service_id'=>$servicId])->all();
        $serviceComfortZone = ServiceComfortZone::find()->where(['service_id'=>$servicId])->all();
        foreach($serviceComfortZone as $cz){
            $comfortZone[] = ComfortZone::find()->where(['id'=>$cz->comfort_zone_id])->one();
        }
        $serviceAutoType = ServiceAutoType::find()->where(['service_id'=>$servicId])->all();
        foreach($serviceAutoType as $st){
            $autoType[] = AutoType::find()->where(['id'=>$st->auto_type_id])->one();
        }
        $serviceType = ServiceType::find()->where(['id'=>$servic->service_type_id])->one();
        $img = ServicesImg::findAll(['services_id'=>$servicId]);
        $favorites = Favorites::find()->where(['service_id'=>$_GET['service_id'],'user_id'=>Yii::$app->user->id])->one()->id;
        $countReviews = Reviews::find()->where(['publ' => 1, 'service' => 1, 'spirit_id' => $_GET['service_id']])->count();
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
                'serviceLogo' => $serviceLogo,
                'serviceType' => $serviceType,
                'img' => $img,
                'servic' => $servic,
                'favorites' => $favorites,
                'countReviews' => $countReviews,
            ]);
    }

    public function actionEdit_service(){
        $servicId = $_GET['service_id'];
        $service = Services::find()->where(['id'=>$servicId])->one();
        $servicName = $service->name;
        $serviceDescription = $service->description;
        $email = $service->email;
        $servicWS = $service->website;
        $address = Address::find()->where(['service_id'=>$servicId])->all();
        $workHours = WorkHours::find()->where(['service_id'=>$servicId])->all();
        $workHours = ArrayHelper::index($workHours, 'day');
        $telephone = Phone::find()->where(['service_id'=>$servicId])->all();
        //$brends = BrandCars::find()->all();
       /* $brendsSelect = ServiceBrandCars::find()->where(['service_id'=>$servicId])->all();*/
        /*$brendsSelect = ArrayHelper::index($brendsSelect, 'brand_cars_id');*/

        $serviceType =ServiceType::find()->where(['id'=>$_GET['service_type']])->one();
        return $this->render('edit',
            [
                'serviceID' => $servicId,
                'name' => $servicName,
                'address' => $address,
                'description' => $serviceDescription,
                'email' => $email,
                'website' => $servicWS,
                'workHours' => $workHours,
                'telephone' => $telephone,
                /*'brendSelect' => $brendsSelect,*/
                'service' => $service,
                'serviceType' => $serviceType,
                'img' => ServicesImg::find()->where(['services_id'=>$servicId])->all()
            ]);
    }

    public function actionUpdate_to_sql(){
        $this->cleaning_tables_relations($_POST['service_id']);
        $service = new Services();
        $serv = $service->find()->where(['id' => $_POST['service_id']])->one();

        $serv->name = $_POST['title'];
        $serv->description = $_POST['text'];
        $serv->service_type_id = $_POST['service_type'];
        $serv->website = $_POST['website'];
        $serv->email = $_POST['mailadress'];
        $serv->user_id = Yii::$app->user->id;

        //Debug::prn($_FILES);

        /*if(!empty($_FILES['file']['name'])){
            if(!file_exists('media/users/'.Yii::$app->user->id)){
                mkdir('media/users/'.Yii::$app->user->id.'/');
            }
            if(!file_exists('media/users/'.Yii::$app->user->id.'/'.date('Y-m-d'))){
                mkdir('media/users/'.Yii::$app->user->id.'/'.date('Y-m-d'));
            }
            $dir = 'media/users/'.Yii::$app->user->id.'/'.date('Y-m-d').'/';
            move_uploaded_file($_FILES['file']['tmp_name'], $dir.$_FILES['file']['name']);
            $serv->photo = $dir.$_FILES['file']['name'];
        }*/
        $serv->save();
        //Добавляем зоны комфорта
        if(isset($_POST['comfort'])) {
            foreach ($_POST['comfort'] as $zone) {
                $cz = new ServiceComfortZone();
                $cz->service_id = $serv->id;
                $cz->comfort_zone_id = $zone;
                $cz->save();
            }
        }
        //Добавляем типы авто
        if(isset($_POST['workWith'])) {
            foreach ($_POST['workWith'] as $autoType) {
                $at = new ServiceAutoType();
                $at->service_id = $serv->id;
                $at->auto_type_id = $autoType;
                $at->save();
            }
        }

        //Добавляем марки авто
        if(isset($_POST['brands'])){
            foreach($_POST['brands'] as $br){
                $brC = new ServiceBrandCars();
                $brC->service_id = $serv->id;
                $brC->brand_cars_id = $br;
                $brC->type = 1;
                $brC->save();
            }
        }

        if(isset($_POST['brandsCargo'])){
            foreach ($_POST['brandsCargo'] as $brCargo) {
                $brCar = new ServiceBrandCars();
                $brCar->service_id = $serv->id;
                $brCar->brand_cars_id = $brCargo;
                $brCar->type = 2;
                $brCar->save();
            }
        }

        if(isset($_POST['brandsMoto'])){
            foreach ($_POST['brandsMoto'] as $brCargo) {
                $brCar = new ServiceBrandCars();
                $brCar->service_id = $serv->id;
                $brCar->brand_cars_id = $brCargo;
                $brCar->type = 3;
                $brCar->save();
            }
        }

        //Добавляем телефоны
        if(isset($_POST['phoneNumber'])) {
            foreach ($_POST['phoneNumber'] as $ph) {
                $phone = new Phone();
                $phone->service_id = $serv->id;
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
                    $saf->service_id = $serv->id;
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
                    $work->service_id = $serv->id;
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
                $ar->service_id = $serv->id;
                $ar->address = $address['title'];
                $ar->region_id = $address['regionId'];
                $ar->city_id = $address['cityId'];
                $ar->save();
            }
        }
        $serviceTypeId = $_POST['service_type'];
        $service = Services::find()->where(['service_type_id'=>$serviceTypeId,'user_id'=>Yii::$app->user->id])->all();
        Yii::$app->session->setFlash('success','Сервис успешно обновлен');
        return $this->render('my_services',
            [
                'serviceTypeId' => $serviceTypeId,
                'service' => $service,
            ]);

    }

    public function actionDel_service(){
        $servicId = $_GET['service_id'];
        $serviceTypeId = $_GET['service_type'];
        $this->del_service($servicId);
        //$service = Services::find()->where(['service_type_id'=>$serviceTypeId,'user_id'=>Yii::$app->user->id])->all();
        Yii::$app->session->setFlash('success','Сервис успешно удален');
        /*return $this->render('my_services',
            [
                'serviceTypeId' => $serviceTypeId,
                'service' => $service,
            ]);*/
        return $this->redirect(['my_services', 'service_type'=>$serviceTypeId]);
    }

    public function actionSelect_service(){
        $role = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
        if(!empty($role['business']) || !empty($role['admin']) || !empty($role['root'])){
            $serviceTypes = ServiceType::find()->all();
            return $this->render('select', ['service' => $serviceTypes]);
        }
        else{
            $this->view->params['bannersHide'] = true;
            return $this->render('error-service');
        }
    }

    public function actionMy_services(){
        $serviceTypeId = $_GET['service_type'];
        $service = Services::find()->where(['service_type_id'=>$serviceTypeId,'user_id'=>Yii::$app->user->id])->all();
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
        ServiceBrandCars::deleteAll(['service_id'=>$id]);
        ServicesImg::deleteAll(['service_id'=>$id]);
        Services::deleteAll(['id'=>$id]);
    }

    public function cleaning_tables_relations($id){
        WorkHours::deleteAll(['service_id'=>$id]);
        Phone::deleteAll(['service_id'=>$id]);
        Address::deleteAll(['service_id'=>$id]);
        ServiceAutoType::deleteAll(['service_id'=>$id]);
        ServiceAddFields::deleteAll(['service_id'=>$id]);
        ServiceAutoType::deleteAll(['service_id'=>$id]);
        ServiceComfortZone::deleteAll(['service_id'=>$id]);
        ServiceBrandCars::deleteAll(['service_id'=>$id]);
    }

    public function actionGet_city_select(){
        $city = GeobaseCity::find()->where(['region_id' => $_POST['region']])->all();
        echo Html::dropDownList('city_widget', 0, ArrayHelper::map($city, 'id', 'name'), ['class' => 'addContent__adress', 'id'=>'selectCityWidget', 'prompt'=>'Город']);
    }

    public function actionAll_services(){

        if(isset($_GET['typeId']) || isset($_GET['idReg']) || isset($_GET['idCity'])){

            foreach ($_GET as $key => $value) {
                if ($value == 'undefined') {
                    $_GET[$key] = '';
                }
            }

            if(!empty($_GET['idReg'])){
                $idReg = $_GET['idReg'];
                $address['region_id'] = $idReg;
            }

            if(isset($_GET['idCity'])){
                $idCity = $_GET['idCity'];
                $address['city_id'] = $idCity;
            }

            if(!empty($_GET['typeId'])){
                $typeId = explode(',', substr($_GET['typeId'], 0, -1));
            }
        }
        else{
            $address = \common\classes\Address::get_geo_info();

            if(!empty($address)){
                $idReg = $address['region_id'];
                $idCity = $address['city_id'];
            }
        }

        $services = Services::find()
            ->leftJoin('address', '`address`.`service_id` = `services`.`id`')
            ->leftJoin('services_img','`services_img`.`services_id` = `services`.`id`')
            ->leftJoin('service_type','`service_type`.`id` = `services`.`service_type_id`');




        if (isset($idReg)) {
            $services->andFilterWhere(['`address`.`region_id`' => $idReg]);
        }

        if (isset($idCity)) {
            $services->andFilterWhere(['`address`.`city_id`' => $idCity]);
        }

        if (isset($typeId)) {
            $services->andwhere(['`services`.`service_type_id`' => $typeId]);
        }
        $services->groupBy('`services`.`id`');
        $count = $services->count();

        $pagination = new Pagination([
            /*'forcePageParam' => false,
            'pageSizeParam' => false,*/
            'defaultPageSize' => 12,
            'totalCount' => $services->count(),
        ]);

        $services->offset($pagination->offset)
            ->limit($pagination->limit);


        $services->with('services_img','service_type');

        $services = $services->all();

        $regionName = GeobaseRegion::find()->where(['id' => $idReg])->one()->name;
        $cityName = GeobaseCity::find()->where(['id' => $idCity])->one()->name;
        $description = 'Все автосервисы' . (!empty($regionName) ? " | $regionName" : '') . (!empty($cityName) ? " | $cityName" : '');


        return $this->render('all_services',
            [
                'address' => $address,
                'services' => $services,
                'count' => $count,
                'pagination' => $pagination,
                'description' => $description,
            ]);
    }

    public function actionMap(){
        $this->layout = 'map';


        if(isset($_POST['city_name'])){
            $cookies = Yii::$app->response->cookies;
            $city = GeobaseCity::find()->where(['id'=>$_POST['city_id']])->one();
            $ip['lat'] = $city->latitude;
            $ip['lng'] = $city->longitude;
            $regionId = $city->region_id;
            $cityId = $_POST['city_id'];
            $cookies->add(new \yii\web\Cookie([
                'name' => 'city',
                'value' => $city->name,
                'httpOnly' => false,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'city_id',
                'value' => $cityId,
                'httpOnly' => false,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'region_id',
                'value' => $regionId,
                'httpOnly' => false,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'lat',
                'value' => $ip['lat'],
                'httpOnly' => false,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'lng',
                'value' => $ip['lng'],
                'httpOnly' => false,
            ]));
        }
        else{
            //Debug::prn($cookies->get('city'));
            $cookies = Yii::$app->request->cookies;
            if ($cookies->get('city') !== null) {
                $ip['lat'] = $cookies->get('lat');
                $ip['lng'] = $cookies->get('lng');
                $regionId = $cookies->get('region_id');
                $cityId = $cookies->get('city_id');
            }
            else {
                $user = User::findOne(Yii::$app->user->id);
                if($user->region_id != 0){
                    $cookies = Yii::$app->response->cookies;
                    $region = GeobaseCity::find()->where(['id'=>$user->city_id, 'region_id'=>$user->region_id])->one();
                    $cookies->add(new \yii\web\Cookie([
                        'name' => 'city',
                        'value' => $region->name,
                    ]));
                    $cookies->add(new \yii\web\Cookie([
                        'name' => 'city_id',
                        'value' => $region->id,
                    ]));
                    $cookies->add(new \yii\web\Cookie([
                        'name' => 'region_id',
                        'value' => $region->region_id,
                    ]));
                    $cookies->add(new \yii\web\Cookie([
                        'name' => 'lat',
                        'value' => $region->latitude,
                    ]));
                    $cookies->add(new \yii\web\Cookie([
                        'name' => 'lng',
                        'value' => $region->longitude,
                    ]));
                }
                else {
                    $ip = Yii::$app->ipgeobase->getLocation(Custom_function::getRealIpAddr());
                    $regionId = GeobaseRegion::find()->where(['name' => $ip['region']])->one()->id;
                    $cityId = GeobaseCity::find()->where(['region_id' => $regionId, 'name' => $ip['city']])->one()->id;
                }
            }

        }

        //Debug::prn($cityId);
        $serviceTypes = ServiceType::find()->all();
        $comfortZone = ComfortZone::find()->all();
        return $this->render('map', [
            'serviceType' => $serviceTypes,
            'lat'  => $ip['lat'],
            'lng' => $ip['lng'],
            'region_id' => $regionId,
            'city_id' => $cityId,
            'comfortZone' => $comfortZone,
        ]);
    }
}