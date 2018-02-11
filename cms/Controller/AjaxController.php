<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 11.02.2018
 * Time: 9:32
 */

namespace Cms\Controller;
/**
 * Контроллер, отвечающий за CRUD различных таблиц
 * Class AjaxController
 * @package Cms\Controller
 */

class AjaxController extends MainController
{
    /**
     * Переменная, в тоторую попадут распарсеные из JSON данные из $_GET/$_POST массивов
     * @var
     */
    private $parameters;
    /**
     * Переменная, куда запишется название таблицы
     * @var
     */
    private $table;


    /**
     * Внутренняя функция, возращающяя обновленную таблицу после манипуляций с нею
     * @param $table
     */
    private function returnQuery()
    {
        $sql = $this->queryBuilder
            ->select()
            ->from($this->table)
            ->sql();
        echo json_encode($sql);
    }


    /**
     * Метод, добавляющий в таблицу новую запись
     *
     */
    public function addIntoTable()
    {
        //Записываем в parameters распрарсенный из JSON первый эл-т массива $_POST
        // Первый, так как переданный обьект с параметрами через AJAX будет первым и единственным эл-том массива
        $this->parameters = json_decode(array_shift($this->request->post));
        // Первым эл-том обьекта параметров выступает таблицы
        $this->table = $this->parameters[0];
        // Массив полей и значений, которые нужно добавить идет вторым
        $items = $this->parameters[1];

        $sql = $this->queryBuilder
            ->insert($this->table)
            ->set($items)
            ->sql();
        //Возращаем обновленные данные
        $this->returnQuery();
    }

    /**
     * Метод, получающий из БД определенную таблицу
     */
    public function getTable()
    {
        // Единственным параметром, переданным через AJAX в данном случае будет название таблицы
        $this->table = json_decode(array_shift($this->request->post));
        $this->returnQuery();
    }

    /**
     * Метод, обновляющий данные в опр. таблице
     */
    public function updateTable()
    {
        $this->parameters = json_decode(array_shift($this->request->post));
        $this->table = $this->parameters[0];
        $id    = $this->parameters[1];
        $items = $this->parameters[2];

        $sql = $this->queryBuilder
            ->update($this->table)
            ->set($items)
            ->where('id', $id)
            ->sql();
        $this->returnQuery();
    }


    /**
     * Метод, удаляющий строки из опред. таблицы
     */
    public function deleteFromTable()
    {
        $this->parameters = json_decode(array_shift($this->request->post));

        $this->table = $this->parameters[0];
        $id    = $this->parameters[1];

        $sql = $this->queryBuilder
            ->delete()
            ->from($this->table)
            ->where('id', $id)
            ->sql();
        $this->returnQuery();
    }

}