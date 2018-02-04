<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 19:40
 */
namespace Cms\Controller;

// Мой первый контроллер Home (Не забывать, что все контроллеры наследуются от MainController
class HomeController extends MainController
{
    public function index()
    {
        // додумать как поудобнее обращаться к бд. сейчас не самый лучший вариант
//        $db = $this->di->get('Database');
//        $mybd = new $db();
//        $data = $mybd->get('category', '*');
        $data = ['name' => 'Alex'];
        $this->view->render('index', $data);
    }
    // Чисто для тестов екшен news
    public function news($id = null)
    {
        echo 'News page!' . $id;
    }

}