<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Date
{

    public static function isoToDateBR($dateIso)
    {
        $DateTime = new DateTime($dateIso);
        return $DateTime->format('d/m/Y');
    }

    public static function brToDateIso($dateBr)
    {
        $ano = substr($dateBr, 6);
        $mes = substr($dateBr, 3, -5);
        $dia = substr($dateBr, 0, -8);
        return $ano . "-" . $mes . "-" . $dia;
    }

    public static function getIsoDate()
    {
        date_default_timezone_set('America/Sao_Paulo');
        return date('Y-m-d');
    }
}
