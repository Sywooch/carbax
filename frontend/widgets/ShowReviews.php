<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 16.03.2016
 * Time: 9:13
 */

namespace frontend\widgets;


use common\classes\Debug;
use common\models\db\Reviews;
use yii\base\Widget;

class ShowReviews extends Widget
{
    public $spirit;
    public $id;
    public function run(){
        $reviews = Reviews::find()
            ->leftJoin('`user`','`user`.`id` = `reviews`.`user_id`')
            ->where(['`reviews`.`spirit_id`' => $this->id, '`reviews`.'.$this->spirit => 1, 'publ' => 1])
            ->orderBy('dt_add DESC')
            ->with('user')
            ->all();
        //Debug::prn($reviews->createCommand()->rawSql);
        //Debug::prn($reviews);
        return $this->render('show_reviews',['reviews'=>$reviews]);
    }
}