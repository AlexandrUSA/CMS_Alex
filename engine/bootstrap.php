<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Engine\Cms;
use Engine\DI\DI;

try{
    // Создаем новый экземпляр класса DI и Cms
    $di = new DI();
    $cms = new Cms($di);
    $cms->run();
} catch (\ErrorException $e)
{
    echo $e->getMessage();
}