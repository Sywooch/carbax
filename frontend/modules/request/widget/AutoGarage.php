<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 22.02.2016
 * Time: 9:26
 */

namespace frontend\modules\request\widget;


use common\models\db\Garage;
use yii\base\Widget;
use Yii;

class AutoGarage extends Widget
{
    public function run(){
        $auto = Garage::find()->where(['user_id'=>Yii::$app->user->id])->all();
        return $this->render('autoGarage',
            [
                'auto'=>$auto,
            ]);
    }
}