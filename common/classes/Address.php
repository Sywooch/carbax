<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 19.01.2016
 * Time: 11:41
 */

namespace common\classes;

use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use common\models\db\User;
use Yii;

/**
 * Класс для работы с гео данными пользователя
 *
 * @author Kirill
 * @version 1.0
 */
class Address
{

    /**
     * Возвращает полную информацию о регионе и городе текущего пользователя
     * @static
     * @return array
     */
    public static function get_geo_info(){
        return [
            'region_id' => self::get_region(),
            'region_name' => self::get_region_name(),
            'city_id' => self::get_city(),
            'city_name' => self::get_city_name()
        ];
    }

    /**
     * Возвращает id города текущего пользователя
     * @static
     * @return integer
     */
    public static function get_city(){
        $cookies = Yii::$app->request->cookies;
        if ($cookies->get('city_id') !== null) {
            return $cookies->get('city_id')->value;
        }
        else {
            return User::findOne(Yii::$app->user->id)->city_id;
        }
    }

    /**
     * Возвращает id региона текущего пользователя
     * @static
     * @return integer
     */
    public static function get_region(){
        $cookies = Yii::$app->request->cookies;
        if ($cookies->get('region_id') !== null) {
            return $cookies->get('region_id')->value;
        }
        else {
            return User::findOne(Yii::$app->user->id)->region_id;
        }
    }

    /**
     * Возвращает имя региона текущего пользователя
     * @static
     * @param boolean|integer $id
     * @return string
     */
    public static function get_region_name($id = false){
        if($id){
            return GeobaseRegion::findOne($id)->name;
        }
        else {
            return GeobaseRegion::findOne(self::get_region())->name;
        }
    }

    /**
     * Возвращает имя города текущего пользователя
     * @static
     * @param boolean|integer $id
     * @return string
     */
    public static function get_city_name($id = false){
        if($id){
            return GeobaseCity::findOne($id)->name;
        }
        else {
            return GeobaseCity::findOne(self::get_city())->name;
        }
    }
}