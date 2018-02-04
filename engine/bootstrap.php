<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Engine\Cms;
use Engine\DI\DI;

try{
    // Создаем новый экземпляр класса DI и Cms
    $di = new DI();
    //Подключаем конфиг со всеми путями наших сервисов
    $services = require __DIR__ . '/Config/Service.php';
    // И в цикле создаем экземпляр каждого из них и инициализируем
    foreach ($services as $service) {
        $provider = new $service($di);
        $provider->init();
    }

    $cms = new Cms($di);
    // Все добавленнык в CMS зависимости будут регистрироваться в $di - Хранилище зависимостей (Оттуда их просто достать по их ключу)
    $cms->run();
} catch (\ErrorException $e)
{
    echo $e->getMessage();
}