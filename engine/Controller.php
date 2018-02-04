<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 14:24
 */

namespace Engine;

use Engine\DI\DI;
// Абстрактный класс-родитель всех конртоллеров CMS
abstract class Controller
{
    /**
     * @var \Enging\DI\DI
     */
    protected $di, $db, $view, $config, $request;
    public function __construct(DI $di)
    {
        $this->di = $di;
        // Прописываем  в абстрактном классе-родителе создание обьекта view чтоб не делать это в контроллерах
        $this->view = $this->di->get('View');
        // В св-ве request у каждого контроллера будут хранится все массивы посредники $_GET $_POST etc;
        $this->request = $this->di->get('Request');
        // В переменную конфиг записываем Конфиг из DI контейнера, чтобы иметь к нему доступ из любого контроллера напрямую
        $this->config = $this->di->get('Config');

    }
}