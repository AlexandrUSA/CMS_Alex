<?php
namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;
class Provider extends AbstractProvider
{
    public $serviceName = 'Router';
    public function init()
    {
        $router = new Router('http://cms');
        // Установил зависимость в di контейнер нашего сервиса Router
        $this->di->set($this->serviceName, $router);
    }
}