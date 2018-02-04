<?php
// Тут храним пути по которым мы подключаем наши сервисы
return [
    Engine\Service\Database\Provider::class,
    Engine\Service\Router\Provider::class,
    Engine\Service\View\Provider::class,
    Engine\Service\Config\Provider::class,
];