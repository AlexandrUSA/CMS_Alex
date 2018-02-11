<?php
// Роут формы входа
$this->router->add('login', '/admin/login/', 'LoginController:form');
//Выход из админки
$this->router->add('logout', '/admin/logout/', 'AdminController:logout');

// Роут, отвечающий за автоизацию
$this->router->add('auth-admin', '/admin/auth/', 'LoginController:authAdmin', 'POST');

//Роут для главной страницы админки
$this->router->add('dashboard', '/admin/', 'DashboardController:index');


// -- Роуты для работы с страницами в админке
// Список страниц
$this->router->add('pages', '/admin/pages/', 'PageController:listing');
// Создание новой
$this->router->add('pages-create', '/admin/pages/create', 'PageController:create');
// AJAX - отправка на сервер новой
$this->router->add('pages-add', '/admin/pages/add', 'PageController:add', 'POST');
$this->router->add('pages-update', '/admin/pages/update/', 'PageController:update', 'POST');

// Изменение текущего
$this->router->add('pages-edit', '/admin/pages/edit/(id:int)', 'PageController:edit');
