<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 23:07
 */

$this->router->add('home', '/', 'HomeController:index');

//$this->router->add('ajax', '/ajax', 'HomeController:ajax', 'POST');
$this->router->add('ajaxCreate', '/ajax/add', 'AjaxController:addIntoTable', 'POST');
$this->router->add('ajaxRead', '/ajax/get', 'AjaxController:getTable', 'POST');
$this->router->add('ajaxUpdate', '/ajax/update', 'AjaxController:updateTable', 'POST');
$this->router->add('ajaxDelete', '/ajax/delete', 'AjaxController:deleteFromTable', 'POST');

$this->router->add('news', '/news', 'HomeController:news');
$this->router->add('news_item', '/news/(id:int)', 'HomeController:news');


