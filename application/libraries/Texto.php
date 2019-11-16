<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Texto {

    public static function toUpperCase($text) {
        $encoding = mb_internal_encoding();
        return mb_strtoupper($text, $encoding);
    }

    public static function getControllerName($controllerName, $telasModal) {
        $array = $telasModal->get_controllerName($controllerName);
        if ($array) {
            return $telasModal->get_controllerName($controllerName)[0]->nome;
        }
        return '';
    }

}
