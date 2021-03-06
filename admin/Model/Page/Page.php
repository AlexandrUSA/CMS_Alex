<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 11.02.2018
 * Time: 19:56
 */

namespace Admin\Model\Page;

use Engine\Core\Database\ActiveRecord;

class Page
{
    use ActiveRecord;
    /**
     * Название таблицы, к которой относится модель
     * @var string
     */
    protected $table = 'page';

    public $id, $title, $content, $date;

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


}