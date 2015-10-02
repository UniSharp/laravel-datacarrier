<?php

if (!function_exists('carrier')) {

    function carrier($key = null)
    {
        \App::make('DataCarrier')->hold($key);
    }

}

if (!function_exists('carrier_get')) {

    function carrier_get($key, $default = null)
    {
        return \App::make('DataCarrier')->get($key, $default);
    }

}

if (!function_exists('carrier_set')) {

    function carrier_set($key, $value )
    {
        return \App::make('DataCarrier')->set($key, $value);
    }
}
