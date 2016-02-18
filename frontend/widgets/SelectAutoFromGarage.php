<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 09.12.2015
 * Time: 15:12
 */

namespace frontend\widgets;


use common\models\db\Garage;
use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class SelectAutoFromGarage extends Widget
{

    public function run(){
        $garage = Garage::find()->where(['user_id' => Yii::$app->user->id])->all();
        return Html::dropDownList('manufactures_garage', 0, ArrayHelper::map($garage, 'id', 'title'), ['prompt'=>'Выберите автомобиль','class' => 'addContent__adress', 'id' => 'selectGarage']);
    }

}