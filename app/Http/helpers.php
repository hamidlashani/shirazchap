<?php


if(! function_exists('isActiveModule')){
    function isActiveModule($name){
        return in_array($name,array_keys(\Module::getByStatus(1)));
    }
}