<?php
namespace Engine\Service\View;

use Engine\Service\AbstractProvider;
use Engine\Core\Template\View;
class Provider extends AbstractProvider
{
    public $serviceName = 'View';
    public function init()
    {
        $view = new View();
        // Установил зависимость в di контейнер нашего сервиса Router
        $this->di->set($this->serviceName, $view);
    }
}