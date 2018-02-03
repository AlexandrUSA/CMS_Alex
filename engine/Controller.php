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
    protected $di, $db;
    public function __construct(DI $di)
    {
        $this->di = $di;
    }
}