<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Arvore {

    public static function getArvoreActive($controllerName, $arvore, $telasModal, $text) {
        foreach ($telasModal->get_folhas($arvore->id) as $folha) {
            if ($controllerName == $folha->controller) {
                return $text;
            }
        }
        return '';

    }

    public static function getFolhaActive($controllerName, $folha, $telasModal, $text) {
        if ($controllerName == $folha->controller) {
            return $text;
        }
        return '';
    }

}
