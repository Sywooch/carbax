<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 15.03.2016
 * Time: 11:54
 */

namespace frontend\widgets;


use common\classes\Debug;
use Yii;
use yii\base\Widget;

class AddReviews extends Widget
{
    public $spirit;
    public $id;
    public function run(){
        $userId = Yii::$app->user->id;
        //Debug::prn($userId);
        return $this->render('add_reviews',
            [
                'userId' => $userId,
                'spirit' => $this->spirit,
                'id' => $this->id,
            ]);
    }
}