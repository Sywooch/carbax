<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 03.12.2015
 * Time: 12:20
 */

namespace frontend\modules\ajax\controllers;


use common\classes\Debug;
use common\models\db\TofModels;
use common\models\db\TofTypes;
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
    }

}