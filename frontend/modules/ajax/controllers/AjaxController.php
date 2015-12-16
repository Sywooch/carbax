<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 03.12.2015
 * Time: 12:20
 */

namespace frontend\modules\ajax\controllers;


use common\classes\Debug;
use common\classes\SendingMessages;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use common\models\db\Msg;
use common\models\db\Request;
use common\models\db\RequestAddFieldValue;
use common\models\db\RequestAdditionalFields;
use common\models\db\RequestType;
use common\models\db\Services;
use common\models\db\TofModels;
use common\models\db\TofTypes;
use common\models\db\User;
use frontend\modules\flea_market\widgets\CategoryProductTecDoc;
use frontend\widgets\SelectAutoFromGarage;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;

class AjaxController extends Controller
{

    public function actionGet_auto()
    {
        if ($_POST['type'] == 'man') {
            echo Html::dropDownList(
                'models',
                0,
                ArrayHelper::map(TofModels::find()->where(['mod_mfa_id' => $_POST['id']])->all(), 'mod_id', 'mod_name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'mod']
            );
        }
        if ($_POST['type'] == 'mod') {
            echo Html::dropDownList(
                'types',
                0,
                ArrayHelper::map(TofTypes::find()->where(['typ_mod_id' => $_POST['id']])->all(), 'typ_id', 'typ_mmt_cds'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'typ']
            );
        }
        if ($_POST['type'] == 'typ') {
            if ($_POST['view'] == 1) {
                echo CategoryProductTecDoc::widget();
            }
        }
    }

    public function actionGet_region_select()
    {
        $regions = GeobaseRegion::find()->orderBy('name')->all();
        echo Html::dropDownList('region', 0, ArrayHelper::map($regions, 'id', 'name'), ['id' => 'selectRegionWidgetEdit', 'prompt' => 'Регион', 'class' => 'addContent__adress']);
    }

    public function actionGet_city_select()
    {
        $city = GeobaseCity::find()->where(['region_id' => $_POST['id']])->all();
        echo Html::dropDownList('city', 0, ArrayHelper::map($city, 'id', 'name'), ['id' => 'selectCityWidgetEdit', 'prompt' => 'Город', 'class' => 'addContent__adress']);
    }

    public function actionGet_garage()
    {
        echo SelectAutoFromGarage::widget();
    }

    public function actionGet_tel_user()
    {
        echo User::findOne($_POST['id'])->telephon;
    }

    public function actionGet_request_type()
    {
        $requests = Request::find()->where(['user_id' => Yii::$app->user->id, 'request_type_id' => $_POST['id']])->all();

        if(!empty($requests)){
            echo $html = $this->renderPartial('request',['requests'=>$requests]);
        }

    }

    public function actionGet_raply(){
        $message = Msg::find()->where(['to'=>Yii::$app->user->id,'to_type'=>'request','type_id'=>$_POST['type']])->all();
        if(!empty($message)){
            echo $this->renderPartial('message',['message'=>$message]);
        }
        else{
            echo "На вашу заявку ни кто не откликнулся";
        }
    }

    public function actionReset_request(){
        $region = RequestAddFieldValue::find()->where(['request_id'=>$_POST['id'],'key'=>'regions'])->one();
        $city = RequestAddFieldValue::find()->where(['request_id'=>$_POST['id'],'key'=>'city_widget'])->one();
        $manufactures = RequestAddFieldValue::find()->where(['request_id'=>$_POST['id'],'key'=>'manufactures'])->one();
        $fields = [];
        $fieldsAll = RequestAdditionalFields::find()->where(['request_id'=>$_POST['id']])->all();
        foreach ($fieldsAll as $fl) {
            $fields[] = $fl->add_field_id;
        }
        //Debug::prn($region->value);
        $services = Services::find()
            ->joinWith(['address', 'service_add_fields','service_brand_cars'])
            ->where([
                'address.region_id' => $region->value,
                'address.city_id' => $city->value,
                'service_brand_cars.brand_cars_id' => $manufactures->value,
                'service_add_fields.add_fields_id' => $fields
            ])
            ->all();

        $ids = [];

        foreach($services as $service){
            $msg = $this->generateRequestMsg($_POST['id']);
            SendingMessages::send_message($service->user_id, Yii::$app->user->id, 'Заявка на сервис ' . $service->name, $msg,'request','0',$_POST['id']);
            $ids[] = $service->id;
        }
        echo 'Заявка отправлена';
    }

    public function generateRequestMsg($info){
        $title = RequestAddFieldValue::find()->where(['request_id'=>$info,'key'=>'title'])->one();
        $descr = RequestAddFieldValue::find()->where(['request_id'=>$info,'key'=>'comm'])->one();
        $manufactures = RequestAddFieldValue::find()->where(['request_id'=>$info,'key'=>'manufactures'])->one();
        $data['title'] = $title->value;
        $data['descr'] = $descr->value;
        $data['brand_car'] = $manufactures->value;
        return $this->renderPartial('request_msg_tpl', $data);
    }

}