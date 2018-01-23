<?php

namespace Engine\DI;

class DI
{
    // Хранилище всех зависимостей
    private $container = [];
    // Установка новых зависимостей
    public function set($key, $value)
    {
        $this->container[$key] = $value;
        return $this;
    }
    // Получение текущих зависимостей по ключу $key
    public function get($key)
    {
        return $this->hasKey($key);
    }
    // Проверяем, существует ли ключ $key в зависимостях container
    public function hasKey($key)
    {
        return isset($this->container[$key]) ? $this->container[$key] : null;
    }

}