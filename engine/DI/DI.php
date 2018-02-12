<?php

namespace Engine\DI;

class DI
{
    // Хранилище всех зависимостей CMS
    private $container = [];

    // Установка новых зависимостей в CMS
    public function set($key, $value)
    {
        $this->container[$key] = $value;
        return $this;
    }
    // Получение текущих зависимостей по ключу $key
    public function get($key)
    {
        // Если зависимсть $key есть в контейнере то возращаем ее, если нет - нулл
        return isset($this->container[$key]) ? $this->container[$key] : null;
    }

    /**
     * @param $key
     * @param array $elements
     */
    public function push($key, $element = [])
    {
        if ($this->has($key) !== null) {
            $this->set($key, []);
        }

        if(!empty($element)) {
           // array_push($this->container[$key], $elements);
            $this->container[$key][$element['key']] = $element['value'];
        }

    }

    public function getAll()
    {
        return $this->container;
    }

    public function has($key)
    {
        return isset($this->container[$key]) ? $this->container[$key] : null;
    }

}