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
        // Загружаем модель Page
        $this->load->model('Page');

        exit;
        // под ключом pages загружаем из БД все созданные страницы
        $data['pages'] = $this->model->page->getPages();
        // Рендерим вид list из директории pages
        $this->view->render('pages/list', $data);
    }

    public function create()
    {
        // Загружаем модель Page
        $pageModel = $this->load->model('Page');
        // Рендерим вид create из директории pages
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

    public function edit($id)
    {
        $pageModel = $this->load->model('Page');
        $this->data['page'] = $pageModel->repository->getPageData($id);
        $this->view->render('pages/edit', $this->data);
    }

    public function update()
    {
        $params = $this->request->post;

        if (isset($params['title']) && isset($params['content'])) {
            $pageModel = $this->load->model('Page');
            $pageId = $pageModel->repository->updatePage($params);
        }

    }
}