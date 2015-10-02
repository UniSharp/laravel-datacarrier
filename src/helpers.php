<?php

if (!function_exists('carrier')) {

    function carrier($key = null, $value = null)
    {
        if (is_null($key) && is_null($value)) {
            return \App::make('DataCarrier');
        } elseif (!is_null($key)) {
            return carrier_get($key);
        } else {
            return carrier_set($key, $value);
        }

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
