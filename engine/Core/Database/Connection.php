<?php

namespace Engine\Core\Database;
use \PDO;
use Engine\Core\Config\Config;
class Connection
{
    private $connect;
    public function __construct()
    {
        $this->connection();    // При создании экземпляра класса будем соединяться с БД
    }
    // Функция поделючения к БД
    private function connection()
    {
        $config  = Config::file('Database');
        $dsn = "mysql:host={$config['host']}; dbname={$config['db_name']}; charset={$config['charset']}";
        try {
            $this->connect = new PDO($dsn, $config['username'], $config['password'], $config['options']);
        } catch (PDOException $e) {
            echo 'Подключние не удалось';
            exit($e->getMessage());
        }
    }
    // Функция записи в БД
    // Возращает true / false в зав-сти от успеха обращения к БД
    public function write( $sql, $values = [])
    {
        $write = $this->connect->prepare( $sql ); // Подготавливаем запрос $sql к БД
        return $write->execute($values); // И выполняем его
    }

    public function query($sql, $values = []) {
        $query = $this->connect->prepare( $sql );
        $query->execute($values);
        $result = $query->fetchAll();   // Получаем ассоциативный массив из обьекта ответа PDO
        return ($result) ? $result : [];
    }


    public function getLastID()
    {
        return $this->connect->lastInsertId();
    }

}