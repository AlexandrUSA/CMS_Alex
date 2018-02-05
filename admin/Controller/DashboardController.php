<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 04.02.2018
 * Time: 18:51
 */

namespace Admin\Controller;

class DashboardController extends AdminController
{
    public function index()
    {
        $this->view->render('dashboard');
    }
}