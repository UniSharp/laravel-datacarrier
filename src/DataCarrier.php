<?php

namespace Unisharp\DataCarrier;

//use Illuminate\Support\Collection;

class DataCarrier
{
    protected $items = [];
    protected $methods = [];
    protected $hold_key_name;
    public function __construct()
    {
    }

    public function set($key, $value = null)
    {
        if (func_num_args() == 1 && !empty($this->hold_key_name)) {
            return $this->set($this->hold_key_name, $key);
        }

        return array_set($this->items, $key, $value);
    }

    public function get($key = null, $default = null)
    {
        if (is_null($key) && !empty($this->hold_key_name)) {
            return $this->get($this->hold_key_name, $default);
        }

        return array_get($this->items, $key, $default);
    }

    public function all()
    {
        return $this->items;
    }

    public function hold($key)
    {
        $this->hold_key_name = $key;
        return \App::make('DataCarrier');
    }

    public function extend($method_name, \Closure $method)
    {
        $this->methods[$method_name] = $method;
    }

    public function __call($name, $args)
    {
        if (array_key_exists($name, $this->methods) && isset($args[0])) {
            return $this->methods[$name]($this->get($args[0]));
        } elseif (count($args) == 0 && !empty($this->hold_key_name)) {
            return $this->methods[$name]($this->get($this->hold_key_name));
        }
    }
}
