<?php

namespace frontend\modules\flea_market\controllers;

use common\classes\Debug;
use common\models\db\TofManufacturers;
use common\models\db\TofModels;
use common\models\db\TofTypes;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;

class DefaultController extends Controller
{
    public $layout = 'page';
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdd(){
        $tofMan = TofManufacturers::find()->all();
        return $this->render('add', ['tofMan' => $tofMan]);
    }

    public function actionGet_model(){
        $model = TofModels::find()->where(['mod_mfa_id'=>$_POST['mfa_id']])->all();
        echo Html::dropDownList('model',0,ArrayHelper::map($model, 'mod_id', 'mod_name'), ['class'=>'addContent__adress', 'id'=>'modSelect']);
    }

    public function actionGet_types(){
        $model = TofTypes::find()->where(['typ_mod_id'=>$_POST['mod_id']])->all();
        echo Html::dropDownList('types',0,ArrayHelper::map($model, 'typ_id', 'typ_mmt_cds'), ['class'=>'addContent__adress']);
    }
}
