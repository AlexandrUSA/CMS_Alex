<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 04.02.2018
 * Time: 23:26
 */

namespace Engine\Service\Request;

use Engine\Service\AbstractProvider;
use Engine\Core\Request\Request;
class Provider extends AbstractProvider
{
    public $serviceName = 'Request';
    public function init()
    {
        // Надо все же написать один глобальный конфиг наподобие Ларавел чтоб все подобный параметры менять оттуда
        $request = new Request();
        // Запись в di контейнер новой зависимости под именем $serviceName
        $this->di->set($this->serviceName, $request);
    }
}