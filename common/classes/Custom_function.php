<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 11.11.2015
 * Time: 14:00
 */

namespace common\classes;


use frontend\widgets\SelectMultiplayAuto;
use frontend\widgets\SelectMultiplayCargoAuto;

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
                return "СР";
        }
    }
} 