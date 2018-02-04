<?php
namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;
class Provider extends AbstractProvider
{
    public $serviceName = 'Router';
    public function init()
    {
    	// Надо все же написать один глобальный конфиг наподобие Ларавел чтоб все подобный параметры менять оттуда
        $router = new Router('http://cms');
        // Запись в di контейнер новой зависимости под именем $serviceName
        $this->di->set($this->serviceName, $router);
    }
}