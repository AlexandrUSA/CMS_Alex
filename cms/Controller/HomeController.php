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
        // Получаем все столбцы с твблицы category
        $query = $this->queryBuilder
            ->select()
            ->from('category')
            ->sql();

        $data = ['categories' => $query,];
        $this->view->render('index', $data);
    }
    // Чисто для тестов екшен news
    public function news($id = null)
    {
        echo 'News page!' . $id;
    }


    public function ajax()
    {
        echo json_encode($_POST);
    }

}