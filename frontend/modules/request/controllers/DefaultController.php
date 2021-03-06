<?php

namespace frontend\modules\request\controllers;

use common\classes\Debug;
use common\classes\SendingMessages;
use common\models\db\AddFieldsGroup;
use common\models\db\AutoComBrands;
use common\models\db\AutoComModels;
use common\models\db\AutoComModify;
use common\models\db\AutoComSubmodels;
use common\models\db\AutoWidget;
use common\models\db\BcbBrands;
use common\models\db\BcbModels;
use common\models\db\BcbModify;
use common\models\db\CarMark;
use common\models\db\CarModel;
use common\models\db\CarModification;
use common\models\db\Garage;
use common\models\db\Request;
use common\models\db\RequestAddFieldValue;
use common\models\db\RequestAddForm;
use common\models\db\RequestAdditionalFields;
use common\models\db\RequestByServiceType;
use common\models\db\RequestType;
use common\models\db\RequestTypeAddForm;
use common\models\db\RequestTypeGroup;
use common\models\db\Services;
use common\models\db\ServiceTypeGroup;
use common\models\db\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class DefaultController extends Controller
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
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if ($action->id == 'send_request') {
            Yii::$app->controller->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        /**
         * Проверяем какая завка выбрана и грузим в разные виды
         * Автошкола
         */
        if($_GET['id'] == 11){
            $this->view->params['officeHide'] = true;
            $this->view->params['bannersHide'] = false;
            $requestType = RequestType::find()->where(['id' => $_GET['id']])->one();
            $addForm = RequestTypeAddForm::find()->where(['request_type_id'=>$_GET['id']])->all();
            $groupRequest = RequestTypeGroup::find()->where(['request_type_id'=>$_GET['id']])->all();
            return $this->render('auto_school',
                [
                    'requestType' => $requestType,
                    'addForm' => $addForm,
                    'groups' =>$groupRequest,
                    //'groupService' => $groupService,
                ]);

        }
        /**
         * Шины
         */
        if($_GET['id'] == 6){
            $requestType = RequestType::find()->where(['id' => $_GET['id']])->one();
            $addForm = RequestTypeAddForm::find()->where(['request_type_id'=>$_GET['id']])->all();
            $groupRequest = RequestTypeGroup::find()->where(['request_type_id'=>$_GET['id']])->all();
            return $this->render('request_splints',
                [
                    'requestType' => $requestType,
                    'addForm' => $addForm,
                    'groups' =>$groupRequest,
                    //'groupService' => $groupService,
                ]);
        }
        /**
         * Диски
         */
        if($_GET['id'] == 10){
            $requestType = RequestType::find()->where(['id' => $_GET['id']])->one();
            $addForm = RequestTypeAddForm::find()->where(['request_type_id'=>$_GET['id']])->all();
            $groupRequest = RequestTypeGroup::find()->where(['request_type_id'=>$_GET['id']])->all();
            return $this->render('request_disk',
                [
                    'requestType' => $requestType,
                    'addForm' => $addForm,
                    'groups' =>$groupRequest,
                    //'groupService' => $groupService,
                ]);
        }
        /**
         *Шиномонтаж
         */
        if($_GET['id'] == 1){
            $requestType = RequestType::find()->where(['id' => $_GET['id']])->one();
            $addForm = RequestTypeAddForm::find()->where(['request_type_id' => $_GET['id']])->all();
            return $this->render('request_shinomontag',
                [
                    'requestType' => $requestType,
                    'addForm' => $addForm,
                ]);
        }
        /**
         * Мойка
         */
        if($_GET['id'] == 2){
            $requestType = RequestType::find()->where(['id' => $_GET['id']])->one();
            $addForm = RequestTypeAddForm::find()->where(['request_type_id' => $_GET['id']])->all();
            return $this->render('request_moika',
                [
                    'requestType' => $requestType,
                    'addForm' => $addForm,
                ]);
        }
        /**
         *Автомагазин
         */
        if($_GET['id'] == 3){
            $requestType = RequestType::find()->where(['id' => $_GET['id']])->one();
            $addForm = RequestTypeAddForm::find()->where(['request_type_id' => $_GET['id']])->all();
            return $this->render('request_automagaz',
                [
                    'requestType' => $requestType,
                    'addForm' => $addForm,
                ]);
        }
        /**
         * Эвакуатор
         */
        if($_GET['id'] == 5){
            $requestType = RequestType::find()->where(['id' => $_GET['id']])->one();
            $addForm = RequestTypeAddForm::find()->where(['request_type_id' => $_GET['id']])->all();
            return $this->render('request_evokyator',
                [
                    'requestType' => $requestType,
                    'addForm' => $addForm,
                ]);
        }
        /**
         *Автосервис
         */
        if($_GET['id'] == 7){
            $requestType = RequestType::find()->where(['id' => $_GET['id']])->one();
            $addForm = RequestTypeAddForm::find()->where(['request_type_id' => $_GET['id']])->all();
            return $this->render('request_autoservice',
                [
                    'requestType' => $requestType,
                    'addForm' => $addForm,
                ]);
        }
        /**
         * Тюнинг
         */
        if($_GET['id'] == 8){
            $requestType = RequestType::find()->where(['id' => $_GET['id']])->one();
            $addForm = RequestTypeAddForm::find()->where(['request_type_id' => $_GET['id']])->all();
            return $this->render('request_tuning',
                [
                    'requestType' => $requestType,
                    'addForm' => $addForm,
                ]);
        }
        /**
         *Запчасти
         */
        if($_GET['id'] == 9){
            $requestType = RequestType::find()->where(['id' => $_GET['id']])->one();
            $addForm = RequestTypeAddForm::find()->where(['request_type_id' => $_GET['id']])->all();
            return $this->render('request_zapchasti',
                [
                    'requestType' => $requestType,
                    'addForm' => $addForm,
                ]);
        }
        /**
         * Автосалон
         */
        if($_GET['id'] == 12){
            $requestType = RequestType::find()->where(['id' => $_GET['id']])->one();
            $addForm = RequestTypeAddForm::find()->where(['request_type_id' => $_GET['id']])->all();
            return $this->render('request_autosalon',
                [
                    'requestType' => $requestType,
                    'addForm' => $addForm,
                ]);
        }
        /**
         * Автострахование
         */
        if($_GET['id'] == 13){
            $requestType = RequestType::find()->where(['id' => $_GET['id']])->one();
            $addForm = RequestTypeAddForm::find()->where(['request_type_id' => $_GET['id']])->all();
            return $this->render('request_avtostrahovka',
                [
                    'requestType' => $requestType,
                    'addForm' => $addForm,
                ]);
        }

        else {

            $requestType = RequestType::find()->where(['id' => $_GET['id']])->one();
            $addForm = RequestTypeAddForm::find()->where(['request_type_id' => $_GET['id']])->all();
            return $this->render('index',
                [
                    'requestType' => $requestType,
                    'addForm' => $addForm,
                ]);
        }
    }

    public function actionSend_request(){

        //Debug::prn($_POST);

        /**
         * получение дополнительных полей
         */
       /* $fieldsForm = RequestTypeAddForm::find()->where(['request_type_id'=>$_POST['request_type_id']])->all();
        foreach ($fieldsForm as $ff) {
            $fieldsFormName = RequestAddForm::find()->where(['id' => $ff->add_form_id])->one();
            $fieldsFormArr[$fieldsFormName->key] = $fieldsFormName;
        }*/
        $groups = RequestTypeGroup::find()->where(['request_type_id'=>$_POST['request_type_id']])->all();
        $request_type_id = $_POST['request_type_id'];
        unset($_POST['request_type_id']);
        $info = json_encode($_POST,JSON_UNESCAPED_UNICODE);
        //Debug::prn($info);


         /*$autoWidget = new AutoWidget();
         $autoWidget->auto_type = $_POST['typeAuto'];
         $autoWidget->year = $_POST['year'];
         $autoWidget->brand_id = $_POST['requestMarkAuto'];
         $autoWidget->model_id = $_POST['requestModelAuto'];
         $autoWidget->type_id = $_POST['types'];
        if ($_POST['typeAuto'] == 1) {
            $manName = BcbBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name;
            $modelName = BcbModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name;
            $typeName = BcbModify::find()->where(['id' => $_POST['types']])->one()->name;
        }
        if ($_POST['typeAuto'] == 2) {
            $manName = AutoComBrands::find()->where(['id' => $_POST['requestMarkAuto']])->one()->name;
            $modelName = AutoComModels::find()->where(['id' => $_POST['requestModelAuto']])->one()->name;
            //$typeName = AutoComModify::find()->where(['id' => $_POST['model']])->one()->name;

            //$autoWidget->submodel_id = $_POST['submodel'];
            //$autoWidget->submodel_name = AutoComSubmodels::find()->where(['id' => $_POST['submodel']])->one()->name;
        }
        if ($_POST['typeAuto'] == 3) {
            $manName = CarMark::find()->where(['id_car_mark' => $_POST['requestMarkAuto']])->one()->name;
            $modelName = CarModel::find()->where(['id_car_model' => $_POST['requestModelAuto']])->one()->name;
            //$typeName = CarModification::find()->where(['id_car_modification' => $_POST['types']])->one()->name;
           // $autoWidget->moto_type = $_POST['mototype'];
        }

         $autoWidget->brand_name = $manName;
         $autoWidget->model_name = $modelName;
         $autoWidget->type_name = $typeName;

         $autoWidget->save();*/

         $request = new Request();
         $request->request_type_id = $request_type_id;
         $request->user_id = Yii::$app->user->id;
         $request->info_request = $info;
         //$request->id_auto_widget = $autoWidget->id;
         $request->save();







         foreach ($_POST as $key=>$value) {
             $addRequest = new RequestAddFieldValue();
             $addRequest->request_id = $request->id;
             $addRequest->key = $key;
             $addRequest->value = $value;
             $addRequest->save();
         }

         $fields = [];
         foreach($groups as $group){
             $gr = AddFieldsGroup::find()->where(['id' => $group->add_fields_group_id])->one();
             if(isset($_POST[$gr->label])) {
                 foreach ($_POST[$gr->label] as $label) {
                     $saf = new RequestAdditionalFields();
                     $saf->request_id = $request->id;
                     $saf->add_field_id = $label;
                     $fields[] = $label;
                     $saf->save();
                 }
             }
         }


        /**
         * Получение типов сервисов по которым должен происходить поиск
        */

        $serviceTypeSearch = RequestByServiceType::find()->where(['request_id' => $request_type_id])->all();
        $serviceSearch = [];
        foreach ($serviceTypeSearch as $s) {
            $serviceSearch[] = $s->service_type_id;
        }



        $services = Services::find()
            ->joinWith(['address', 'service_add_fields','service_brand_cars'])
            ->filterWhere([
                'address.region_id' => $_POST['region'],
                'address.city_id' => $_POST['city'],
                'service_brand_cars.brand_cars_id' => $_POST['manufactures'],
                '`services`.`service_type_id`' => $serviceSearch,
                'service_add_fields.add_fields_id' => $fields
            ])

            ->all();


        $ids = 0;



        foreach($services as $service){

            $msg = $this->renderPartial('request_msg_tpl',['post'=>$_POST,'name'=>$service->name,'selectFields'=>$fields,'requestId'=>$request_type_id]);

            $m = SendingMessages::send_message($service->user_id, Yii::$app->user->id, 'Заявка на сервис ' . $service->name, $msg,'request','0',$request->id);

            Yii::$app->mailer->compose('msg_request',['name'=>$service->name, 'id' => $service->id, 'id_msg' => $m])
                ->setTo(User::getEmail($service->user_id))
                ->setFrom('admin@carbax.ru')
                ->setSubject('Заявка на сервис ' . $service->name)
                ->setTextBody($msg)
                ->send();

            $ids++;
        }

        return $this->render('send_request');
    }

    public function actionAll_requests(){
        $this->view->params['bannersHide'] = false;
        $requests = Request::find()->where(['user_id' => Yii::$app->user->id])->all();
        $requestType = RequestType::find()->all();
        return $this->render('my_requests', ['requests' => $requests,'requestType'=>$requestType]);
    }

    public function actionDelete($id){
        Request::deleteAll(['id' => $id]);
        Yii::$app->session->setFlash('success','Заявка успешно удалена.');
        $requests = Request::find()->where(['user_id' => Yii::$app->user->id])->all();
        $requestType = RequestType::find()->all();
        return $this->render('my_requests', ['requests' => $requests,'requestType'=>$requestType]);

    }

    public function generateRequestMsg($info){
        $data['title'] = $info['title'];
        $data['descr'] = $info['comm'];
        $data['brand_car'] = $info['manufactures'];
        return $this->renderPartial('request_msg_tpl', $data);
    }

    public function actionRequest_type(){
        $requestType = RequestType::find()->all();
        return $this->render('request_type', ['requestType' => $requestType]);
    }

    public function actionEdit(){
        //Debug::prn($_GET['id']);

        $requestTypeId = Request::find()->where(['id'=>$_GET['id']])->one()->request_type_id;

        $requestType = RequestType::find()->where(['id'=>$requestTypeId])->one();
        $addForm = RequestTypeAddForm::find()->where(['request_type_id'=>$requestTypeId])->all();
        $region = RequestAddFieldValue::find()->where(['request_id'=>$_GET['id'],'key'=>'regions'])->one();
        $city = RequestAddFieldValue::find()->where(['request_id'=>$_GET['id'],'key'=>'city_widget'])->one();
        $manufactures = RequestAddFieldValue::find()->where(['request_id'=>$_GET['id'],'key'=>'manufactures'])->one();

        return $this->render('edit',
            [
                'requestType'=>$requestType,
                'addForm' => $addForm,
                'requestTypeId'=>$requestTypeId,
            ]);
    }
}
