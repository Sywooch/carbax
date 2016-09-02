<?php

namespace common\classes;

class Parser {

    public static function parse ($tpl, $data = array(), $view = false, $parse_file = true) {
        $file = ($parse_file) ? file_get_contents($tpl) : $tpl;

        foreach ($data as $key => $value) {
            $key = "{".$key."}";
            $file = preg_replace("/$key/", $value, $file);
        }

        if ($view) {
            echo $file;
        }
        else {
            return $file;
        }
    }

    public static function render($tpl, $data = array(), $view = true){
        if(!empty($data)){
            foreach($data as $k => $v){
                ${$k} = $v;
            }
        }
        if($view){
            include($tpl);
        }
        else {
            ob_start();
            include($tpl);
            $a = ob_get_contents();
            ob_end_clean();
            return $a;
        }
    }

} 