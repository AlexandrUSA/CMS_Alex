<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 05.02.2018
 * Time: 10:44
 */

namespace Engine\Service\Load;

use Engine\Service\AbstractProvider;
use Engine\Load;
class Provider extends AbstractProvider
{
    public $serviceName = 'Load';
    public function init()
    {
        $load = new Load($this->di);
        // Установил зависимость в di контейнер нашего сервиса Database
        $this->di->set($this->serviceName, $load);
    }
}