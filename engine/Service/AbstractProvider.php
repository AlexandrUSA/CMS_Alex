<?php
namespace Engine\Service;
// Для каждого созданного в бущущем сервиса будет свой провайдер
// Этот класс будет классом-родителем всех провайдеров

abstract class AbstractProvider
{
    protected $di;
    /**
     * Получает все зависимости нашего di контейнера.
     * @param \Engine\DI\DI $di
     */
    public function __construct(\Engine\DI\DI $di)
    {
        $this->di = $di;
    }

    /**
     * Инициализация нового сервиса
     */
    abstract function init();
}