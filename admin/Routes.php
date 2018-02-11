<?php
// Роут формы входа
$this->router->add('login', '/admin/login/', 'LoginController:form');
//Выход из админки
$this->router->add('logout', '/admin/logout/', 'AdminController:logout');

// Роут, отвечающий за автоизацию
$this->router->add('auth-admin', '/admin/auth/', 'LoginController:authAdmin', 'POST');

//Роут для главной страницы админки
$this->router->add('dashboard', '/admin/', 'DashboardController:index');


//Роуты для работы с страницами в админке
$this->router->add('pages', '/admin/pages/', 'PageController:listing');
$this->router->add('pages-create', '/admin/pages/create', 'PageController:create');
// AJAX
$this->router->add('pages-add', '/admin/pages/add', 'PageController:add', 'POST');