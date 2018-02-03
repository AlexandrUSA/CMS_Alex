<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 02.02.2018
 * Time: 14:52
 */

namespace Engine\Core\Router;


class DispatchedRoute
{
 private $controller, $parameters;
 public function __construct( $controller, $parameters = [])
 {
     $this->controller = $controller;
     $this->parameters = $parameters;
 }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getParameters()
    {
        return $this->parameters;
    }

}