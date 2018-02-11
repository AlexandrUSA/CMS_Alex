<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 14:29
 */

namespace Engine\Core\Router;

/**
 * Класс UrlDispatcher хранит роуты паттерны для их определения
 * выполняет поиск контроллеров и параметров запроса
 * @package Engine\Core\Router
 */
class UrlDispatcher
{
    private $methods = ['GET', 'POST'], // Хранит типы наших методов, будут добавлятся по ходу
            $routes  = [    // Роуты для методов
                    'GET' => [],
                    'POST' => []
            ],
            $patterns = [   // Перечисляем наши рег. выр. паттерны для роутинга
                'int' => '[0-9]+',
                'str' => '[a-zA-Z\.\-_%]+',
                'any' => '[a-zA-Z0-9\.\-_%]+'
            ];

    /**
     * Вспомогательная функция
     * @param $action по которому ищем массив интерисующих роутов 'GET', 'POST'
     * @return Массив роутов по ключу $action
     */
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
     * Функция поиска нужного роута по переданному uri
     * @param $method
     * @param $uri
     * @return Обьект DispatchedRoute с переданным ему конроллером (Пока без параметров)
     */
    public function dispatch($method, $uri)
    {
        // Получаем все роуты переданного метода $action
        $routes = $this->routes(strtoupper($method));
        // Если в массиве имеется роут с заданным uri то создаем новый екземпляр DispatchedRoute
        // и передаем ему в качестве контроллера, тот который лежит в нашем массиве $routes для заданного uri
        if(is_array($routes) && array_key_exists($uri, $routes)) {
            return new DispatchedRoute($routes[$uri]);
        }
        // Если искомого роута в массиве нет выполняем doDispatch
        return $this->doDispatch($method, $uri);
    }

    private function doDispatch($method, $uri)
    {
            foreach($this->routes($method) as $route => $controller)
            {
                $pattern = "#^" . $route . "$#s";

                if(preg_match($pattern, $uri, $parameters))
                {
                    return new DispatchedRoute($controller, $this->clearParameters($parameters));
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
        // print_r($pattern);
       // echo '<br>';
        $convertedPattern = $this->convertPattern($pattern);
        //print_r($convertedPattern);
        //echo '<br>';
        $this->routes[strtoupper($method)][$convertedPattern] = $controller;
    }

    /**
     * Функция конвертации пришедшего описательного паттерна в паттерн с нужными нам значениями
     * @param $pattern
     * @return string с вставленными значениями
     */
    private function convertPattern($pattern)
    {
        // если этот петтерн без параметров (параметры указываются в скобках) то просто возращаем его
        if( strpos($pattern, '(') === false)
        {
           // echo $pattern;
           // echo '<br>';
            return $pattern;
        }
       // echo $pattern с параметрами типа (параметр:тип) то конвертируем его;
        return preg_replace_callback('#\((\w+):(\w+)\)#', [$this, 'replacePattern'], $pattern);
    }

    /**
     * Вспомогательная функция для замены эл-ов в паттерне на реальный пришедший id и рег.
     * @param $matches типа Array прим. [[0] => (id:int) [1] => id [2] => int]
     * @return string с вставленными значениями
     */
    private function replacePattern($matches)
    {
       // print_r($matches);
       // echo '<br>';
        return '(?<' . $matches[1] . '>' . strtr($matches[2], $this->patterns) . ')';
    }

    /**
     * Вспомогательная функция для очистки параметров от мусора
     * @param $parameters типа массив [[0] => /news/27 [id] => 27 [1] => 27]
     * @return чистый массив типа [[id] => 27]
     */
    private function clearParameters($parameters)
    {
        foreach ($parameters as $key => $parameter)
        {
            // если ключ числовой то нас не интерисует и мы его удаляем
            if(is_int($key))
            {
                unset($parameters[$key]);
            }
        }
       // print_r($parameters);
        return $parameters;
    }
}












