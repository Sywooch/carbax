<?php
/**
 * Created by PhpStorm.
 * User: Îôèñ
 * Date: 10.12.2015
 * Time: 10:48
 */

namespace frontend\widgets;


use common\models\db\Msg;
use Yii;
use yii\base\Widget;

class NumberUnreadMessages extends Widget
{
    public function run(){
        $count = Msg::find()->where(['to'=>Yii::$app->user->id,'readed'=>0])->count();
        if($count > 0){
            return "<span>($count)</span>";
        }
    }
}