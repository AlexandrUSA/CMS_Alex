<?php
return [
    'host' => 'localhost',
    'db_name' => 'store',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'options' => [   // Прописали по умолчанию режим отображения ошибок, режим выборки данных и эмулирование подготовки запроса
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => TRUE,
    ],
];

