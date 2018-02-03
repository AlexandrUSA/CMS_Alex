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
        if($queryPos = strpos($uri, '?'))
        {
            $uri = substr($uri, 0, $queryPos);
        }
        return $uri;
    }
}