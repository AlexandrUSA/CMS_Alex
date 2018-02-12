<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 05.02.2018
 * Time: 10:14
 */

namespace Engine;

use Engine\DI\DI;
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
    public $di;


    public function __construct(DI $di)
    {
        $this->di = $di;
    }

    public function model($modelName, $modelDir = false)
    {

        // Первый символ имени возводим в верхний регистр
        $modelName = ucfirst($modelName);
        // Обычно Класс модели будет равен имени директории где он лежит, но
        // но на случай если ее имя все же будет отличаться то в model будет передаваться и название директории
        //В $modelDir запишем это название, или просто подставим имя класса
        $modelDir  = $modelDir ? $modelDir : $modelName;

        // Подставляем в маску полученные названия класса модели, ее директории и окружения

        $nameSpaceModel = sprintf(
            self::MASK_MODEL_REPOSITORY,
            ENV, $modelDir, $modelName
        );
        /**
         * Проверяем, существует ли данный класс
         */
        $isClassModel = class_exists($nameSpaceModel);
        // Если да, то пушим в DI нашу модель
//        if ($isClassModel) {
//            $this->di->push('Model', ['key' => $modelName, 'value' => new $nameSpaceModel($this->di)]
//            );
//            return true;
//        }
//
//        return false;

        if ($isClassModel) {
            $modelRegistry = $this->di->get('Model') ?: new \stdClass();
            $modelRegistry->{$modelName} = new $nameSpaceModel($this->di);
            $this->di->set('Model', $modelRegistry);
        }
    }

}