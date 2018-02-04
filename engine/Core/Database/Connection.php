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
    public function write( $sql )
    {
        $write = $this->connect->prepare( $sql ); // Подготавливаем запрос $sql к БД
        return $write->execute(); // И выполняем его
    }

    /**
     * Функция чтения из БД
     * @param $table название таблицы
     * @param $elems то, что хотим выбрать
     * @return ассоциативный массив с ответом или путой массив при неудаче
     */
    public function get($table, $elems) {
        $sql = "SELECT $elems FROM $table";
        $query = $this->connect->prepare( $sql );
        $query->execute();
        $result = $query->fetchAll();   // Получаем ассоциативный массив из обьекта ответа PDO
        return ($result) ? $result : [];
    }

}