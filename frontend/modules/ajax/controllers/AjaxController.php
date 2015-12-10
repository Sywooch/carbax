<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 03.12.2015
 * Time: 12:20
 */

namespace frontend\modules\ajax\controllers;


use common\classes\Debug;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use common\models\db\TofModels;
use common\models\db\TofTypes;
use frontend\modules\flea_market\widgets\CategoryProductTecDoc;
use frontend\widgets\SelectAutoFromGarage;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;

class AjaxController extends Controller
{

    public function actionGet_auto(){
        if($_POST['type'] == 'man'){
            echo Html::dropDownList(
                'models',
                0,
                ArrayHelper::map(TofModels::find()->where(['mod_mfa_id' => $_POST['id']])->all(), 'mod_id', 'mod_name'),
                ['prompt' => 'Модель','class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'mod']
            );
        }
        if($_POST['type'] == 'mod'){
            echo Html::dropDownList(
                'types',
                0,
                ArrayHelper::map(TofTypes::find()->where(['typ_mod_id' => $_POST['id']])->all(), 'typ_id', 'typ_mmt_cds'),
                ['prompt' => 'Модель','class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'typ']
            );
        }
        if($_POST['type'] == 'typ'){
            if($_POST['view'] == 1) {
                echo CategoryProductTecDoc::widget();
            }
        }
    }

    public function actionGet_region_select(){
        $regions = GeobaseRegion::find()->orderBy('name')->all();
        echo Html::dropDownList('region',0, ArrayHelper::map($regions, 'id', 'name'),['id'=>'selectRegionWidgetEdit', 'prompt'=>'Регион','class' => 'addContent__adress']);
    }

    public function actionGet_city_select(){
        $city = GeobaseCity::find()->where(['region_id' => $_POST['id']])->all();
        echo Html::dropDownList('city',0, ArrayHelper::map($city, 'id', 'name'), ['id'=>'selectCityWidgetEdit', 'prompt'=>'Город','class' => 'addContent__adress']);
    }

    public function actionGet_garage(){
        echo SelectAutoFromGarage::widget();
    }

}