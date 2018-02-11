<?php
require 'Core.php';



$parameters = json_decode(array_shift($_POST));

$table = $parameters[0];
$id    = $parameters[1];

$sql = $a->delete()
    ->from('category')
    ->where('id', $id)
    ->sql();

$sql2 = $a->select()
        ->from($table)
        ->sql();
echo json_encode($sql2);