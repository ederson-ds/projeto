<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Arvore {

    public static function getArvoreActive($controllerName, $arvore, $telasModal, $text) {
        foreach ($telasModal->get_folhas($arvore->id) as $folha) {
            if ($controllerName == lcfirst(str_replace("ç", "c", $folha->nome))) {
                return $text;
            }
        }
        return '';

    }

    public static function getFolhaActive($controllerName, $folha, $telasModal, $text) {
        if ($controllerName == lcfirst(str_replace("ç", "c", $folha->nome))) {
            return $text;
        }
        return '';
    }

}
