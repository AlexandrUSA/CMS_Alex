<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 14:24
 */

namespace Engine;

use Engine\DI\DI;
use Engine\Core\Database\QueryBuilder;
// Абстрактный класс-родитель всех конртоллеров CMS
abstract class Controller
{
    protected $di, $db, $queryBuilder, $view, $config, $request, $load, $model;
    public function __construct(DI $di)
    {
        $this->di = $di;
        // В load записываем Сервис Load, отвечающий за загрузку нужных Моделей
        $this->load = $this->di->get('Load');
        // в model получаем доступ к моделям
        $this->model = $this->di->get('Model');
        echo "<pre>";
        print_r($this->di);
        // В db записываем наше соединение с БД
        // При QueryBuilder уже не нужен (но вдруг пригодится)
        //$this->db = $this->di->get('Database');
       // В queryBuilder записали экземпляр класса queryBuilder длч конструирования запросов в контроллере
        $this->queryBuilder = new QueryBuilder();
        // Прописываем  в абстрактном классе-родителе создание обьекта view чтоб не делать это в контроллерах
        $this->view = $this->di->get('View');
        // В св-ве request у каждого контроллера будут хранится все массивы посредники $_GET $_POST etc;
        $this->request = $this->di->get('Request');
        // В переменную конфиг записываем Конфиг из DI контейнера, чтобы иметь к нему доступ из любого контроллера напрямую
        $this->config = $this->di->get('Config');
       // $this->initVars();
    }

    /**
     * Функция инициализации всех переменных, заданных в классе
     * @return $this
     */
    public function initVars()
    {
        // Получаем массив всех переменных
        $vars = array_keys(get_object_vars($this));

        // И в цикле проходим по ним
        foreach ($vars as $var) {
            // Когда находим в DI Контейнере
            if($this->di->has($var)) {
                $this->{$var} = $this->di->get($var);
            }
        }
        return $this;

    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function __get($key)
    {
        return $this->di->get($key);
    }
}