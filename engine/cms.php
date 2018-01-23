<?php
namespace Engine;

class Cms
{
    private $di;
    public function __construct($di)
    {
        $this->di = $di;
    }
    // Запуск CMS
    public function run()
    {
        echo 1;
    }
}
?>