<?php

function removeAliasPHP($controllerName) {
    return str_replace(".php", "", strtolower($controllerName));
}
