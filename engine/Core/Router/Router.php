<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 13:54
 */
namespace Engine\Core\Router;

class Router
{
    private $routes = [],
            $host,
            $dispatcher;

    public function __construct($host)
    {
        $this->host = $host;
    }

    /**
     * Функция добавления новых роутов в CMS
     * записывает в массив роутов новый маршрут
     * @param $key
     * @param $pattern
     * @param $controller
     * @param string $action
     */
    public function add($key, $pattern, $controller, $action = 'GET')
    {
        $this->routes[$key] =[
            'pattern'    => $pattern,
            'controller' => $controller,
            'method'     => $action,
        ];
    }

    /**
     * @param $method
     * @param $uri
     * @return DispatchedRoute
     */
    public function dispatch($method, $uri)
    {
        return $this->getDispatcher()->dispatch($method, $uri);
    }

    /**
     * @return UrlDispatcher
     */
    public function getDispatcher()
    {
        if($this->dispatcher === null) {
            // Создаем экземпляр диспатчер
            $this->dispatcher = new UrlDispatcher();

            // В цикле регистрируем наши роуты
            foreach ($this->routes as $route)
            {
                $this->dispatcher->registRoute($route['method'], $route['pattern'], $route['controller']);
            }
        }
        return $this->dispatcher;
    }
}