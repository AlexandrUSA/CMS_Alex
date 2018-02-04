<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 04.02.2018
 * Time: 18:50
 */

namespace Admin\Controller;


class LoginController extends AdminController
{
    public function form()
    {
        $this->view->render('login');
    }
}