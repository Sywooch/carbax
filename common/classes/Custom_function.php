<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 11.11.2015
 * Time: 14:00
 */

namespace common\classes;


use common\models\db\Reviews;
use frontend\widgets\SelectMultiplayAuto;
use frontend\widgets\SelectMultiplayCargoAuto;
use frontend\widgets\SelectMultiplayMoto;

class Custom_function {
    function get_week_day($day){
        switch ($day) {
            case 'mo':
                return "ПН";
            case 'tu':
                return "ВТ";
            case 'we':
                return "СР";
            case 'th':
                return "ЧТ";
            case 'fr':
                return "ПТ";
            case 'sa':
                return "СБ";
            case 'su':
                return "ВС";
        }
    }

    public static function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public static function getByType($type, $key){
        switch ($type) {
            case 1:
                $result['marketTitleAdd'] = '';
                $result['nameWidget'] = SelectMultiplayAuto::widget();
                return $result[$key];
            case 2:
                $result['nameWidget'] = SelectMultiplayCargoAuto::widget();
                return $result[$key];
            case 3:
                $result['nameWidget'] = SelectMultiplayMoto::widget();
                return $result[$key];;
        }
    }

    public static function getCookieByKey($key){
        
    }


    public static function showDate($date){
        $day = getdate($date);

        switch($day['mon']){
            case 1: $mon = 'января';break;
            case 2: $mon = 'февраля';break;
            case 3: $mon = 'марта';break;
            case 4: $mon = 'апреля';break;
            case 5: $mon = 'мая';break;
            case 6: $mon = 'июня';break;
            case 7: $mon = 'июля';break;
            case 8: $mon = 'августа';break;
            case 9: $mon = 'сентября';break;
            case 10: $mon = 'октября';break;
            case 11: $mon = 'ноября';break;
            case 12: $mon = 'декабря';break;
        }

        return $day['mday'] . ' ' . $mon . ' ' . $day['year'] ;
    }

    public static function showRating($id,$sprit){
        $reviews = Reviews::find()
            ->where([$sprit => 1, 'spirit_id' => $id, 'publ' => 1])
            ->all();

        $rating = 0;
        $kol = 0;

        foreach ($reviews as $review) {
            $rating += $review->rating;
            $kol++;
        }

        $reting = $rating/$kol;
        return $reting;
    }
} 