<?php

namespace Engine;

use Engine\Core\Router\DispatchedRoute;
use Engine\Helper\Common;

class Cms
{
    private $di;
    public $router;

    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('Router');
    }

    /**
     * Запуск CMS
     *
     */
    public function run()
    {
        try {
            // Подключение роутов
            require_once __DIR__ . '\..\cms\Routes.php';

            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getURI());
            //   print_r($routerDispatch);

            //Если похожего контроллера у нас нету - выводим контроллер ошибок с екшеном 404
            if($routerDispatch == null)
            {
                $routerDispatch = new DispatchedRoute('ErrorController:error404');
            }
            // Получаем название контролллера и необходимого екшена
            list($class, $action) = explode(':', $routerDispatch->getController(), 2);
            // print $class . '<br>' . $action;

            $controller = '\\Cms\\Controller\\' . $class;
            $parameters = $routerDispatch->getParameters();
            // И вызываем получившийся контролллер с акшеном
            call_user_func_array([new  $controller($this->di), $action], $parameters);
           // print_r($this->di);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit();
        }

    }
}

?>