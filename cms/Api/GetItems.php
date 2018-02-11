<?php
require 'Core.php';

$table = json_decode(array_shift($_POST));
$sql = $a->select()
    ->from($table)
    ->sql();
echo json_encode($sql);
