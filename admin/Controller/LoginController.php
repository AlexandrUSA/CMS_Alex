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
        if($this->auth->getHashUser() !== null) {
            header('Location: /admin/');
            exit;
        }
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
        $password = md5($params['password']);
        $query = $this->db->query("SELECT * FROM `users` WHERE email = '{$params['email']}' AND password = '$password' LIMIT 1");
        if( !empty($query)) {
            $user = $query[0];
            if($user['role'] === 'admin') {
                $hash = (string) md5($user['id'] . ['email'] . $user['password'] . $this->auth->salt());
                $this->db->write("UPDATE users SET hash = '$hash' WHERE id = '{$user['id']}'");
                $this->auth->authorize($hash);
                header('Location: /admin/login/');
                exit;
            }
        }
    }

}