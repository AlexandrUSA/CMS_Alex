<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 05.02.2018
 * Time: 10:14
 */

namespace Engine;
/**
 * Класс - загрузчик моделей
 * Class Load
 * @package Engine
 */

class Load
{
    // Маски, в которые мы пропишем необходимые нам модели, в зав-сти от окружения
    // Пример на модели User и UserRepository
    // \Admin\Model\User\User   \Cms\Model\User\User
    // \Admin\Model\User\UserRepository   \Cms\Model\User\UserRepository
    const MASK_MODEL_ENTITY = '\%s\Model\%s\%s';
    const MASK_MODEL_REPOSITORY = '\%s\Model\%s\%sRepository';

    public function model($modelName, $modelDir = false)
    {
        global $di;

        // Первый символ имени возводим в верхний регистр
        $modelName = ucfirst($modelName);
        // Создаем экземпляр класса-пустышки stdClass
        $model     = new \stdClass();
        // Обычно Класс модели будет равен имени директории где он лежит, но
        // но на случай если ее имя все же будет отличаться то в model будет передаваться и название директории
        //В $modelDir запишем это название, или просто подставим имя класса
        $modelDir  = $modelDir ? $modelDir : $modelName;

        // Подставляем в маску полученные названия класса модели, ее директории и окружения
        $nameSpaceEntity = sprintf(
            self::MASK_MODEL_ENTITY,
            ENV, $modelDir, $modelName
        );

        $nameSpaceRepository = sprintf(
            self::MASK_MODEL_REPOSITORY,
            ENV, $modelDir, $modelName
        );

        $model->entity = $nameSpaceEntity;
        $model->repository = new $nameSpaceRepository($di);

        return $model;
    }

}