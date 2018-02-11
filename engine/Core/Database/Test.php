<?php
namespace Engine\Core\Database;
class Test
{
    public $data = [1,2,3,45];
    public function __construct()
    {
        echo json_encode($this->data);
    }
}