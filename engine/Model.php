<?php

namespace Engine;

use Engine\Core\Database\QueryBuilder;
use Engine\DI\DI;

/**
 * Class Model Абстрактный класс с которого берут начала все модели CMS
 * @package Engine
 */
abstract class Model
{

    protected $di, $db, $config, $queryBuilder;

    /**
     * Model constructor.
     * @param $di
     */
    public function __construct(DI $di)
    {
        // Записали модели в нащ контейнер зависимостей
        $this->di      = $di;
        // В db записали доступ к БД
        // При QueryBuilder уже в принципе не нужен (но вдруг пригодится)
       // $this->db      = $this->di->get('Database');
        $this->config  = $this->di->get('Config');
        // ДЛя обращения к БД используется QueryBuilder
        $this->queryBuilder = new QueryBuilder();
    }
}