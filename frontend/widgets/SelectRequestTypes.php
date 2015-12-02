<?php
/**
 * Created by PhpStorm.
 * User: ќфис
 * Date: 02.12.2015
 * Time: 15:33
 */

namespace frontend\widgets;


use common\models\db\RequestType;
use yii\base\Widget;

class SelectRequestTypes extends Widget
{
    public $classNav;
    public $classUl;
    public function run(){
        $reqtype = RequestType::find()->all();
        return $this->render('request_types',
            [
                'req'=>$reqtype,
                'classNav'=>$this->classNav,
                'classUl'=>$this->classUl,
            ]);
    }

}