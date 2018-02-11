<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 04.02.2018
 * Time: 23:21
 */

namespace Engine\Core\Request;

/**
 * Class Request
 * Класс посредник, чтобы не общаться с суперглобальными массивами напрямую
 * @package Engine\Core\Request
 */

class Request
{
    public $get     = [];
    public $post    = [];
    public $request = [];
    public $cookie  = [];
    public $files   = [];
    public $server  = [];

    public function __construct()
    {
        $this->get     = $_GET;
        $this->post    = $_POST;
        $this->request = $_REQUEST;
        $this->cookie  = $_COOKIE;
        $this->files   = $_FILES;
        $this->server  = $_SERVER;
    }

}