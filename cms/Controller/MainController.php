<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 20:39
 */

namespace Cms\Controller;

use Engine\Controller;

/**
 * Стартовый контроллер MainController
 * сделал чтобы вынести конструкттор всех контроллеров сюда, а в остальных прописывал только методы
 * @package Cms\Controller
 */
class MainController extends Controller
{
    public function __construct($di)
    {
        parent::__construct($di);
    }

}