<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 04.02.2018
 * Time: 18:50
 */

namespace Admin\Controller;


class PageController extends AdminController
{
    public function listing()
    {
        $pageModel = $this->load->model('Page');

        $data['pages'] = $pageModel->repository->getPages();

        $this->view->render('pages/list', $data);
    }

    public function create()
    {
        $pageModel = $this->load->model('Page');

        $this->view->render('pages/create');
    }

    public function add()
    {
        $params = $this->request->post;

        if (isset($params['title']) && isset($params['content'])) {
            $pageModel = $this->load->model('Page');
            $pageId = $pageModel->repository->createPage($params);
            echo  $pageId;
        }
    }
}