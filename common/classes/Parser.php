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

} 