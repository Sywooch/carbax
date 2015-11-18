<?php

namespace frontend\modules\offers\widgets;

use common\classes\Debug;
use common\models\db\News;
use himiklab\ipgeobase\IpGeoBase;
use Yii;
use yii\base\Widget;
use yii\db\Query;

class OffersWidgetFront extends Widget
{

    public function run(){
        $region = Yii::$app->ipgeobase->getLocation($_SERVER["REMOTE_ADDR"]);
        $offers = (new Query())->from('offers')->limit(9)->orderBy('id DESC')->all();
        return $this->render('offers', ['offers' => $offers]);

    }

}