<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 04.02.2018
 * Time: 19:47
 */

namespace Engine\Core\Config;


class Config
{
    /**
     * Функция получения определенного значения из определенного файла в папке конфигов (так на всякий случай)
     * @param $key
     * @param string $name
     * @return null
     */
    public static function item($key, $name = 'main')
    {
        $config = static::file($name);
        return isset($config[$key]) ? $config[$key] : null;
    }

    /**
     * Функция загрузки фалов конфига
     * Загружает файл по имени
     * @param $name
     * @return bool|mixed
     * @throws \Exception
     */
    public static function file($name)
    {
        // Находим по имени нужный нам файл в конфигах
        $file = $_SERVER['DOCUMENT_ROOT'] . '/' . mb_strtolower(ENV) . '/Config/' . $name . '.php';

        if(file_exists($file)) {
            //Если нашли - подключаем
            $config = require $file;
            // Все конфиги возращают массив. Так что если вернулся не массив - значит что-то пошло не так
            if(is_array($config)) {
                return $config;
            } else {
                throw new \Exception(sprintf('Конфиг %s возращает не массив а черти что!', $config));
            }
        } else {
            throw new \Exception(sprintf('Не удалось найти файл %s', $file));
        }
        return false;
    }
}












