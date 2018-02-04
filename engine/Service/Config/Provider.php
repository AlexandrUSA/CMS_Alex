<?php
namespace Engine\Service\Config;

use Engine\Service\AbstractProvider;
use Engine\Core\Config\Config;
class Provider extends AbstractProvider
{
    public $serviceName = 'Config';
    public function init()
    {

        $config['Common'] = Config::file('Common');
        $config['Database'] = Config::file('Database');
        // Установил зависимость в di контейнер нашего сервиса Config
        $this->di->set($this->serviceName, $config);
    }
}