<?php

namespace frontend\modules\request\controllers;

use common\classes\Debug;
use common\classes\SendingMessages;
use common\models\db\AddFieldsGroup;
use common\models\db\Request;
use common\models\db\RequestAddFieldValue;
use common\models\db\RequestAdditionalFields;
use common\models\db\RequestType;
use common\models\db\RequestTypeAddForm;
use common\models\db\RequestTypeGroup;
use common\models\db\Services;
use common\models\db\ServiceTypeGroup;
use Yii;
use yii\filters\VerbFilter;
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
        $requestType = RequestType::find()->where(['id'=>$_GET['id']])->one();
        $addForm = RequestTypeAddForm::find()->where(['request_type_id'=>$_GET['id']])->all();
       // $groupService = RequestTypeGroup::find()->where(['request_type_id'=>$_GET['id']])->all();
        //Debug::prn($addForm);
        return $this->render('index',
            [
                'requestType' => $requestType,
                'addForm' => $addForm,
                //'groupService' => $groupService,
            ]);
    }

    public function actionSend_request(){
        $groups = RequestTypeGroup::find()->where(['request_type_id'=>$_POST['request_type_id']])->all();

        $request = new Request();
        $request->request_type_id = $_POST['request_type_id'];
        $request->user_id = Yii::$app->user->id;
        $request->save();
        unset($_POST['request_type_id']);

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

        /*$services = Services::find()
            ->select('services.id, address.address, user_id, name, email, description, add_fields_id, address.region_id, address.city_id, brand_cars_id')
            ->leftJoin('service_add_fields', '`service_add_fields`.`service_id`')
            ->leftJoin('address', '`address`.`service_id` = `services`.`id`')
            ->leftJoin('service_brand_cars', '`service_brand_cars`.`service_id` = `services`.`id`')
            ->where([
                'address.region_id' => $_POST['regions'],
                'service_add_fields.add_fields_id' => $fields
            ])
            ->andWhere(['address.region_id' => $_POST['regions']])
            ->andWhere(['address.city_id' => $_POST['city_widget']])
            ->with('address')
            ->with('service_brand_cars')
            ->all();*/

        $services = Services::find()
            ->joinWith(['address', 'service_add_fields','service_brand_cars'])
            ->where([
                'address.region_id' => $_POST['regions'],
                'address.city_id' => $_POST['city_widget'],
                'service_brand_cars.brand_cars_id' => $_POST['manufactures'],
                'service_add_fields.add_fields_id' => $fields
            ])
            ->all();

        $ids = [];
        foreach($services as $service){
            $send = SendingMessages::send_message($service->user_id, Yii::$app->user->id, 'Заявка на сервис ' . $service->name, 'Пришла заявка');
            Debug::prn($send);
            $ids[] = $service->id;
        }
        Debug::prn($ids);

        return $this->render('send_request');
    }
}
