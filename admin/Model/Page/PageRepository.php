<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 05.02.2018
 * Time: 9:53
 */
namespace Admin\Model\Page;

use Engine\Model;


/**
 * Class UserRepository
 * Тут будут хранится все методы работы с юзерами
 * @package Admin\Model\User
 */
class PageRepository extends Model
{
    public function getPages()
    {

        $sql = $this->queryBuilder->select()
            ->from('page')
            ->orderBy('id', 'DESC')
            ->sql();
        return $sql;
    }

    /**
     * @param $params
     * @return mixed
     */
    public function createPage($params)
    {
        $page = new Page;
        $page->setTitle($params['title']);
        $page->setContent($params['content']);
        $id = $page->save();
        return $id;
    }

}