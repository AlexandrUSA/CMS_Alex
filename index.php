<?php
header("Access-Control-Allow-Origin: *");
define('ROOT', __DIR__);
define('ENV', 'Cms'); // Устанавливаем имя текущего окружения
// Отправная точка CMS
require_once 'engine/bootstrap.php';

?>
