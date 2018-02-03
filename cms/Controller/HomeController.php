<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 19:40
 */
namespace Cms\Controller;

// Мой первый контроллер Home (Не забывать, что все контроллеры наследуются от абстрактного контроллера из Engine\Controller)
class HomeController extends MainController
{


    public function index()
    {
        echo 'Index page';
    }

    public function news()
    {
        echo 'News page!';
    }

}