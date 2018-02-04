<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 23:07
 */

$this->router->add('home', '/', 'HomeController:index');
$this->router->add('news', '/news', 'HomeController:news');
$this->router->add('news_item', '/news/(id:int)', 'HomeController:news');