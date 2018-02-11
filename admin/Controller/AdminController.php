<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 20:39
 */

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;
/**
 * Класс родитель всех контроллеров админки
 * Class AdminController
 * @package Admin\Controller
 */
class AdminController extends Controller
{
    /**
     * @var Auth Хранит экземпляр класса Auth для работы с авторизацей
     */
    protected $auth;

    public function __construct($di)
    {
        parent::__construct($di);
        // Создаем новый экземпляр класса Авторизация
        $this->auth = new Auth();

        // Если автоизацию еще не проходили ($hash_user в Auth = null) перенаправляем на страницу авторизации
       if($this->auth->getHashUser() == null) {
           header('Location: /admin/login/');
           exit;
       }

    }

    /**
     *  Функция проверки залогинен ли пользовател
     */
    public function checkAuth()
    {

    }

    public function logout()
    {
        $this->auth->unAuthorize();
        header('Location: /admin/login/');
        exit;
    }

}