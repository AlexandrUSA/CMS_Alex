<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 20:33
 */

namespace Cms\Controller;

// Контроллер, обрабатывающий все ошибки
class ErrorController extends MainController
{
    public function error404()
    {
        echo '404 Page';
    }
}