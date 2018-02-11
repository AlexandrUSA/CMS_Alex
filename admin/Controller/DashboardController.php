<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 04.02.2018
 * Time: 18:51
 */

namespace Admin\Controller;


//use Engine\Core\Database\Connection;
//
//$ddb = new Connection();
//
//$data = $ddb->query("SELECT * FROM `users`");
//print_r($data);

class DashboardController extends AdminController
{
    public function index()
    {
        // Загружаем через лоадер модель User и UserRepository
        $userModel = $this->load->model('User');
        //$userModel->repository->test();
        //print_r($userModel->repository->getUsers());


       $this->view->render('dashboard');
    }
}