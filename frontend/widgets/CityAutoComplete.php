<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 05.01.2016
 * Time: 11:29
 */

namespace frontend\widgets;


use common\classes\Debug;
use common\models\db\GeobaseCity;
use yii\base\Widget;

class CityAutoComplete extends Widget
{

    public function run(){
        $city = GeobaseCity::find()
            ->select([
                '`geobase_city`.`name` as value',
                '`geobase_city`.`name` as  label',
                '`geobase_city`.`id` as id',
                '`geobase_region`.`name` as region_name'
            ])
            ->leftJoin('`geobase_region`', '`geobase_region`.`id` = `geobase_city`.`region_id`')
            ->asArray()
            ->all();


        $i = 0;
        foreach($city as $c){
            $r[$i]['id'] = $c['id'];
            $r[$i]['value'] = $c['value'];
            $r[$i]['label'] = $c['label']. " (" . $c['region_name'] . ")";
            $i++;
        }

        return $this->render('city_auto_complete', ['regions'=>$r]);
    }

}