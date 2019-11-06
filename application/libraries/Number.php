<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Number {

    public function numberToFloat($value) {
        return str_replace(",", ".", str_replace(".", "", $value));
    }

    public static function floatToNumber($num) {
        if (!$num) {
            return null;
        }
        return number_format($num, 2, ',', '.');
    }

}
