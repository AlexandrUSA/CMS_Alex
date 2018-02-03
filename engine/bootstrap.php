<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Engine\Cms;
use Engine\DI\DI;

try{
    // Создаем новый экземпляр класса DI и Cms
    $di = new DI();
    //Подключаем конфиг со всеми путями наших сервисов
    $services = require __DIR__ . '/Config/Service.php';
    // И в цикле создаем экземпляр каждого из них и инициализируем его
    foreach ($services as $service) {
        $provider = new $service($di);
        $provider->init();
    }

    $cms = new Cms($di);
    // В будущем буду добавлять какие-либо зависимрсти и оним все попадут в наш DI Container
    $cms->run();
} catch (\ErrorException $e)
{
    echo $e->getMessage();
}