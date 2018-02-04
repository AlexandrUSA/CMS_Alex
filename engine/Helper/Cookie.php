<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 04.02.2018
 * Time: 19:50
 */

namespace Engine\Helper;
/**
 * Class Cookie Хелпер для установления, получения и удаления файлов Cookie
 * @package Engine\Helper
 */

class Cookie
{
    /**
     * Устанавливаем
     * @param $key
     * @param $value
     * @param int $time
     */
    public static function set($key, $value, $time = 31536000)
    {
        setcookie($key, $value, time() + $time, '/');
    }

    /**
     * Получаем
     * @param $key
     * @return null
     */
    public static function get($key)
    {
        if(isset($_COOKIE[$key])) {
            return $_COOKIE[$key];
        }
        return null;
    }

    /**
     * Удаляем
     * @param $key
     */
    public static function delete($key)
    {
        if(isset($_COOKIE[$key])) {
            self::set($key, '', -3600);
            unset($_COOKIE[$key]);
        }
    }

}