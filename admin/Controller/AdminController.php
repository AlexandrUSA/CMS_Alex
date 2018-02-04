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
        $this->auth = new Auth();
        $this->checkAuth();

    }

    /**
     *  Функция проверки залогинен ли пользовател
     */
    public function checkAuth()
    {
        if(!$this->auth->isAuthorized()) {
            header('Location: /admin/login/', true, 301);
            exit;
        }
    }

}