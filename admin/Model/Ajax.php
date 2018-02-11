<?php
namespace Admin\Model;
header("Access-Control-Allow-Origin: *");

spl_autoload_register(function ($class_name) {
    include __DIR__ . '/../../' . $class_name . '.php';
});

define('ENV', 'Cms');

use Engine\Core\Database\QueryBuilder;


$a = new QueryBuilder();


$sql = $a->select()
        ->from('category')
        ->sql();
echo json_encode($_SERVER['REQUEST_METHOD']);


