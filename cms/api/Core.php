<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 10.02.2018
 * Time: 19:28
 */

namespace Cms\Api;

header("Access-Control-Allow-Origin: *");
spl_autoload_register(function ($class_name) {
    include __DIR__ . '/../../' . $class_name . '.php';
});
define('ENV', 'Cms');

use Engine\Core\Database\QueryBuilder;
$a = new QueryBuilder();

/*---------------------------------------------------------------------*/

