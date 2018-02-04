<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 04.02.2018
 * Time: 18:50
 */

namespace Admin\Controller;

use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;

class LoginController extends Controller
{
    protected $auth;

    public function __construct(DI $di)
    {
        parent::__construct($di);
        $this->auth = new Auth();
    }

    /**
     *  Функция рендера вида login
     */
    public function form()
    {
        $this->view->render('login');
    }

    public function authAdmin()
    {
        $params = $this->request->post;
        $this->auth->authorize('gfdgdfg');
        print_r($params);
    }
}