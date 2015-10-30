<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 02.10.2015
 * Time: 7:57
 */

namespace frontend\modules\services\controllers;


use common\classes\Debug;
use common\models\db\BrandCars;
use common\models\db\ServiceType;
use common\models\db\ServiceTypeGroup;
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
        return $this->render('add', ['brands' => $brandCars]);
    }

    public function actionAdd_to_sql(){
        Debug::prn($_POST);
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