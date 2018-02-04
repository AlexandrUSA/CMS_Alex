<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 20:33
 */

namespace Admin\Controller;

// Контроллер, обрабатывающий все ошибки
class ErrorController extends AdminController
{
    public function error404()
    {
        echo '404 Page';
    }
}