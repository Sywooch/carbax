<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 03.12.2015
 * Time: 12:20
 */

namespace frontend\modules\ajax\controllers;


use common\classes\Custom_function;
use common\classes\Debug;
use common\classes\SendingMessages;
use common\models\db\AutoComBrands;
use common\models\db\AutoComModels;
use common\models\db\AutoComModify;
use common\models\db\AutoComSubmodels;
use common\models\db\AutoWidget;
use common\models\db\BcbBrands;
use common\models\db\BcbModels;
use common\models\db\BcbModify;
use common\models\db\BrendYear;
use common\models\db\CargoautoYear;
use common\models\db\CarMark;
use common\models\db\CarModel;
use common\models\db\CarModification;
use common\models\db\Garage;
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
use frontend\widgets\SelectAuto;
use frontend\widgets\SelectAutoFromGarage;
use frontend\widgets\SelectMultiplayAuto;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;

class AjaxController extends Controller
{

    public function actionGet_auto()
    {
        //Debug::prn($_POST);
        if($_POST['type'] == 'typeAuto'){
            if($_POST['id'] == 1){
                $man = BcbBrands::find()->orderBy('name')->all();
                echo Html::dropDownList(
                    'manufactures',
                    0,
                    ArrayHelper::map($man, 'id', 'name'),
                    ['prompt' => 'Выберите бренд', 'class' => 'addContent__adress brand_select_car', 'id' => 'selectAutoWidget', 'type' => 'man']);
            }
            if($_POST['id'] == 2){
                $man = AutoComBrands::find()->orderBy('name')->all();
                echo Html::dropDownList(
                    'manufactures',
                    0,
                    ArrayHelper::map($man, 'id', 'name'),
                    ['prompt' => 'Выберите бренд', 'class' => 'addContent__adress brand_select_car', 'id' => 'selectAutoWidget', 'type' => 'cargoman']);
            }
            if($_POST['id'] == 3){
                $man = CarMark::find()->orderBy('name')->all();
                echo Html::dropDownList(
                    'manufactures',
                    0,
                    ArrayHelper::map($man,'id_car_mark','name'),
                    ['prompt' => 'Выберите бренд', 'class' => 'addContent__adress brand_select_car', 'id' => 'selectAutoWidget', 'type' => 'motooman']
                );
            }
        }
        if ($_POST['type'] == 'man') {
            $year = BrendYear::find()->where(['id_brand'=>$_POST['id']])->one();
            if($year->max_y == 9999){
                $yearEnd = 2015;
            }
            else{
                $yearEnd = $year->max_y;
            }
            $yearAll = [];
            for($i=$year->min_y; $i <= $yearEnd; $i++){
                $yearAll[$i] = $i;
            }
           echo Html::dropDownList('year',0,$yearAll,['prompt' => 'Год выпуска', 'class' => 'addContent__adress year_select_car', 'id' => 'selectAutoWidget', 'type' => 'mod']);
        }
        if ($_POST['type'] == 'mod') {
            $model = BcbModels::find()
                        ->select('`bcb_models`.`id`, `bcb_models`.`name`')
                        ->leftJoin('`bcb_modify`','`bcb_modify`.`model_id` = `bcb_models`.`id`')
                        ->where(['brand_id' => $_POST['brandId']])
                        ->andWhere(['<=','`bcb_modify`.`y_from`',$_POST['id']])
                        ->andWhere(['>=','`bcb_modify`.`y_to`',$_POST['id']])
                        ->all();
            echo Html::dropDownList(
                'model',
                0,
                ArrayHelper::map($model,'id','name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'typ']
            );

        }
        if ($_POST['type'] == 'typ') {
            $model = BcbModify::find()->where(['model_id'=>$_POST['id']])
                ->andWhere(['<=','y_from',$_POST['year']])
                ->andWhere(['>=','y_to',$_POST['year']])->all();
            echo Html::dropDownList(
                'types',
                0,
                ArrayHelper::map($model,'id','name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'group']
            );
        }
        if($_POST['type'] == 'group'){
            if ($_POST['view'] == 1) {
                echo CategoryProductTecDoc::widget();
            }
        }

        if($_POST['type'] == 'cargoman'){
            $year = CargoautoYear::find()->where(['id_brand'=>$_POST['id']])->one();
            $yearAll = [];
            for($i=$year->min_y; $i<=$year->max_y; $i++){
                $yearAll[$i] = $i;
            }
            echo Html::dropDownList('year',0,$yearAll,['prompt' => 'Год выпуска', 'class' => 'addContent__adress year_select_car', 'id' => 'selectAutoWidget', 'type' => 'cargomod']);
        }

        if($_POST['type'] == 'cargomod'){
            $model = AutoComModels::find()
                    ->select('`auto_com_models`.`id`, `auto_com_models`.`name`')
                    ->leftJoin('`auto_com_modify`','`auto_com_modify`.`model_id` = `auto_com_models`.`id`')
                    ->where(['`auto_com_models`.`brand_id`' => $_POST['brandId']])
                    ->andWhere(['<=','`auto_com_modify`.`release_from`',$_POST['id']])
                    ->andWhere(['>=','`auto_com_modify`.`release_to`',$_POST['id']])
                    ->all();
            //Debug::prn($model);
            echo Html::dropDownList(
                'model',
                0,
                ArrayHelper::map($model,'id','name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'cargosubmod']
            );
        }

        if($_POST['type'] =='cargosubmod'){
           // Debug::prn($_POST);
            $model = AutoComSubmodels::find()
                    ->select('`auto_com_submodels`.`id`,`auto_com_submodels`.`name`')
                    ->leftJoin('`auto_com_modify`','`auto_com_modify`.`submodel_id` = `auto_com_submodels`.`id`')
                    ->where(['`auto_com_modify`.`model_id`' => $_POST['id']])
                    ->andWhere(['<=','`auto_com_modify`.`release_from`',$_POST['year']])
                    ->andWhere(['>=','`auto_com_modify`.`release_to`',$_POST['year']])
                    ->all();

            echo Html::dropDownList(
                'submodel',
                0,
                ArrayHelper::map($model,'id','name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'cargotyp']
            );
        }

        if($_POST['type'] == 'cargotyp'){
            $model = AutoComModify::find()
                    ->where(['submodel_id'=>$_POST['id']])
                    ->andWhere(['<=','`release_from`',$_POST['year']])
                    ->andWhere(['>=','`release_to`',$_POST['year']])
                    ->all();
            echo Html::dropDownList(
                'types',
                0,
                ArrayHelper::map($model,'id','name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'group']
            );
        }

        if($_POST['type'] == 'motooman'){
            $model = CarModel::find()->where(['id_car_mark'=>$_POST['id']])->orderBy('name')->all();
            echo Html::dropDownList(
                'model',
                0,
                ArrayHelper::map($model,'id_car_model','name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'mototype']
            );
        }

        if($_POST['type'] == 'mototype'){
            $model = CarModification::find()->where(['id_car_model'=>$_POST['id']])->orderBy('name')->all();
            echo Html::dropDownList(
                'types',
                0,
                ArrayHelper::map($model,'id_car_modification','name'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'group']
            );
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


    public function actionGet_auto_new()
    {
        if ($_POST['step'] == 'man') {
            $max = TofModels::find()->select('mod_pcon_start')->where(['mod_mfa_id' => 504])->max('mod_pcon_start');
            $min = TofModels::find()->select('mod_pcon_start')->where(['mod_mfa_id' => 504])->min('mod_pcon_start');
            $max = substr($max, 0, 4);
            $min = substr($min, 0, 4);
            Debug::prn($max);
        }
        if ($_POST['type'] == 'mod') {
            echo Html::dropDownList(
                'types',
                0,
                ArrayHelper::map(TofTypes::find()->where(['typ_mod_id' => $_POST['id']])->all(), 'typ_id', 'typ_mmt_cds'),
                ['prompt' => 'Модель', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'typ']
            );
        }
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

    public function actionGet_hidden_auto(){
        $garage = Garage::find()->where(['id' => $_POST['id']])->one();
        $auto = AutoWidget::find()->where(['id' => $garage->id_auto_widget])->one();
        echo Html::input('hidden','typeAuto',$auto->auto_type);
        echo Html::input('hidden','manufactures',$auto->brand_id);
        echo Html::input('hidden','year',$auto->year);
        echo Html::input('hidden','model',$auto->model_id);
        echo Html::input('hidden','types',$auto->type_id);
        echo Html::input('hidden','submodel',$auto->submodel_id);
    }

    public function actionGet_select_auto(){
        echo Custom_function::getByType($_POST['type'],'nameWidget');
    }

}