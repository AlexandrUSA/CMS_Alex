<?php
namespace Engine\Service\Database;

use Engine\Service\AbstractProvider;
use Engine\Core\Database\Connection;
class Provider extends AbstractProvider
{
    public $serviceName = 'Database';
    public function init()
    {
       $db = new Connection();
       // Установил зависимость в di контейнер нашего сервиса Database
       $this->di->set($this->serviceName, $db);
    }
}