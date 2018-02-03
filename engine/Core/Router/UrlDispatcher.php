<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 14:29
 */

namespace Engine\Core\Router;


class UrlDispatcher
{
    private $methods = ['GET', 'POST'], // Хранит типы наших методов, будут добавлятся по ходу
        $routes  = [    // Роуты для методов
                'GET' => [],
                'POST' => []
        ],
        $patterns = [   // Перечисляем наши рег. выр. паттерны для роутинга
            'int' => '[0-9]+',
            'str' => '[a-zA-z\.\-_%]+',
            'common' => '[0-9a-zA-z\.\-_%]+'
        ];

    private function routes($action)
    {
        return isset($this->routes[$action]) ? $this->routes[$action] : [];
    }
    /**
     * Функция добавления нового паттерна для ротутинга, если понадобится
     * @param $key
     * @param $pattern
     */

    public function addPattern($key, $pattern)
    {
        if( !array_key_exists($key, $this->patterns) ) {
            $this->patterns[$key] = $pattern;
        }
    }

    /**
     * Функция поиска нужного роута по переданному ури
     * @param $method
     * @param $uri
     * @return DispatchedRoute
     */
    public function dispatch($method, $uri)
    {
        // Получаем все роуты переданного метода $action
        $routes = $this->routes(strtoupper($method));
        // Если в массиве имеется роут с заданным uri то создаем новый екземпляр DispatchedRoute и передаем ему uri в качестве контроллера
        if(is_array($routes) && array_key_exists($uri, $routes)) {
            return new DispatchedRoute($routes[$uri]);
        }
        // Если искомого роута в массиве нет выполняем doDispatch
        return $this->doDispatch($method, $uri);
    }

    private function doDispatch($method, $uri)
    {
        if(is_array($method) || is_object($method))
        {
            foreach($this->routes($method) as $route => $controller)
            {
                $pattern = "#^" . $route . "$#s";

                if(preg_match($pattern, $uri, $parameters))
                {
                    return new DispatchedRoute($controller, $parameters);
                }
            }
        }
    }

    /**
     * Функция регистрации нового роута и привязки контроллера
     * записывает в массив контроллер, соответствуюий переданному методу и паттерну
     * @param $method
     * @param $pattern
     * @param $controller
     */
    public function registRoute($method, $pattern, $controller)
    {
        $this->routes[strtoupper($method)][$pattern] = $controller;
    }
}