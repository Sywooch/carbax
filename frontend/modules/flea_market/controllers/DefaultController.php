<?php

namespace frontend\modules\flea_market\controllers;

use common\classes\Debug;
use common\models\db\CategoriesAuto;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use common\models\db\Market;
use common\models\db\Services;
use common\models\db\TofManufacturers;
use common\models\db\TofModels;
use common\models\db\TofSearchTree;
use common\models\db\TofTypes;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
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
        $market = Market::find()->where(['user_id'=>Yii::$app->user->id])->all();
        return $this->render('index',['market'=>$market]);
    }

    public function actionAdd(){
        $tofMan = TofManufacturers::find()->orderBy('mfa_brand')->all();
        $region = GeobaseRegion::find()->all();
        $autoType = CategoriesAuto::find()->all();
        return $this->render('add',
            [
                'tofMan' => $tofMan,
                'region' => $region,
                'autotype' => $autoType,
            ]);
    }

    public function actionAdd_to_sql(){
        $market = new Market();
        $market->name = $_POST['title'];
        $market->man_id = $_POST['manufactures'];
        $market->model_id = $_POST['model'];
        $market->type_id = $_POST['types'];
        $market->region_id = $_POST['region'];
        $market->city_id = $_POST['city'];
        $market->descr = $_POST['descr'];
        $market->price = $_POST['price'];
        $market->dt_add = time();
        if($_POST['userOrService'] == 2){
            $market->service_id = $_POST['selectService'];
        }else{
            $market->service_id = 0;
        }
        $market->user_id = Yii::$app->user->id;
        $market->save();
    }

    public function actionGet_model(){
        $model = TofModels::find()->where(['mod_mfa_id'=>$_POST['mfa_id']])->all();
        echo Html::dropDownList('model',0,ArrayHelper::map($model, 'mod_id', 'mod_name'), ['class'=>'addContent__adress', 'id'=>'modSelect','prompt'=>'Выберите модель']);
    }

    public function actionGet_types(){
        $model = TofTypes::find()->where(['typ_mod_id'=>$_POST['mod_id']])->all();
        echo Html::dropDownList('types',0,ArrayHelper::map($model, 'typ_id', 'typ_mmt_cds'), ['class'=>'addContent__adress','prompt'=>'Выберите тип']);
    }

    public function actionGet_city(){
        $city = GeobaseCity::find()->where(['region_id'=>$_POST['reg_id']])->all();
        echo Html::dropDownList('city',0,ArrayHelper::map($city,'id','name'),['class'=>'addContent__adress','prompt'=>'Выберите город']);

    }

    public function actionGet_service(){
        $service = Services::find()->where(['user_id'=>Yii::$app->user->id])->all();
        echo Html::dropDownList('selectService',0,ArrayHelper::map($service,'id','name'),['class'=>'addContent__adress']);
    }

    public function actionGet_parent_category(){
        $parent = TofSearchTree::find()->where(['str_id_parent'=>$_POST['id']])->all();
        echo Html::dropDownList('parentCategory',0,ArrayHelper::map($parent,'id','str_des'),['class'=>'addContent__adress']);
    }

    public function actionGet_cat(){
        $cat = TofSearchTree::find()->where(['str_id_parent'=>$_POST['cat_id']])->all();
        if($cat){
            echo Html::dropDownList('sub_cat[]',0,ArrayHelper::map($cat, 'str_id', 'str_des'),['class'=>'addContent__adress catSel','prompt'=>'Выберите Категорию']);
        }
    }
}
