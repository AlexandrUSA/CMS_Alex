<?php
namespace Engine\Service;
// Для каждого созданного сервиса будет свой провайдер
// Этот класс является классом-родителем всех провайдеров

abstract class AbstractProvider
{
    // в $di будет храниться экземпляр класса DI
    protected $di;
    /**
     * @param \Engine\DI\DI $di
     */
    public function __construct(\Engine\DI\DI $di)
    {
        $this->di = $di;
    }

    /**
     * Инициализация нового сервиса
     * При инициализации каждого провайдера  он будет тут же записан в Di контейнер в качестве новой зависимости
     */
    abstract function init();
}