<?php

namespace Unisharp\DataCarrier;

use Illuminate\Support\Collection;

class DataCarrier
{
    protected $items = [];
    protected $methods = [];
    public function __construct()
    {
    }

    public function set($key, $value)
    {
        return array_set($this->items, $key, $value);
    }

    public function get($key, $default = null)
    {
        return array_get($this->items, $key, $default);
    }

    public function all()
    {
        return $this->items;
    }

    public function extend($method_name, \Closure $method)
    {
        $this->methods[$method_name] = $method;
    }

    public function __call($name, $args)
    {
        if (array_key_exists($name, $this->methods) && isset($args[0])) {
            return $this->methods[$name]($this->get($args[0]));
        }
    }
}
