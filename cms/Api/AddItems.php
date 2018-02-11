<?php
require 'Core.php';

$parameters = json_decode(array_shift($_POST));
$_POST = [];
$table = $parameters[0];
$items = $parameters[1];

$sql = $a->insert($table)
        ->set($items)
        ->sql();

$sql2 = $a->select()
    ->from($table)
    ->sql();
echo json_encode($sql2);