<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Date {

    public static function isoToDateBR($dateIso) {
        $DateTime = new DateTime( $dateIso );
        return $DateTime->format( 'd/m/Y' );
    }

}
