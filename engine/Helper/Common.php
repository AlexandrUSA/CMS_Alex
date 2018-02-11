<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 18:06
 */
namespace Engine\Helper;

class Common
{
    /**
     *  Функция проверяющие метод обращения (GET или POST)
     * @return строку метода: 'GET' / 'POST'
     */
    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Функция определения текущего uri
     * @return bool|string
     */
    public static function getURI()
    {
        $uri = $_SERVER['REQUEST_URI'];
        // Если были передвны и параметры то обрезаем их
        if($queryPos = strpos($uri, '?'))
        {
            $uri = substr($uri, 0, $queryPos);
        }
        return $uri;
    }
}
?>