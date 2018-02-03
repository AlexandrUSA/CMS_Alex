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

}