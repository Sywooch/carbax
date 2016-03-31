<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 31.03.2016
 * Time: 9:05
 */

namespace frontend\modules\services\widgets;


use common\classes\Debug;
use common\models\db\Offers;
use yii\base\Widget;

class ShowOffersByService extends Widget
{
    public $serviceId;

    public function run()
    {
        $offers = Offers::find()
            ->leftJoin('`offers_images`', '`offers_images`.`offers_id` = `offers`.`id`')
            ->where(['LIKE', 'service_id_str', $this->serviceId . ','])
            ->andWhere(['status' => 1])
            ->with('offers_images')
            ->orderBy('dt_add DESC')
            ->all();

        return $this->render('offers', ['offers' => $offers]);
    }
}