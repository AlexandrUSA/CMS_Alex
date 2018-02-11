<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 08.02.2018
 * Time: 16:17
 */

namespace Engine\Core\Database;

use Engine\Core\Database\Connection;

class QueryBuilder
{
    /**
    Массив куда попадут составные части запроса
     * @var array
     */
    protected $sql = [];

    /**
    Массив куда попадут переданные параметры (если будут)
     * @var array
     */
    public $values = [];


    protected $db;


    public function __construct()
    {
        $this->db = new Connection();
    }


    /**
     * Функция очистки данных масивов 
     Будет выполняться при вызове функций, результаты которых могут стоять только в начале SQL запроса, во избежание ошибок
     //Такие как SELECT, UPDATE, DELETE, INSERT
     */
    public function clear()
    {
        $this->sql    = [];
        $this->values = [];
    }

    /**
    	Функция SELECT пушит в массив запроса SELECT {$fields}
     * @param string $fields строки, какие хотим выбрать (по умолчанию *)
     * @return $this
     */
    public function select($fields = '*')
    {
    	//Очищаем
        $this->clear();
        $this->sql['select'] = "SELECT {$fields} ";
        // Возращаем текущий контекст чтобы можно было реализовать цепочки вызовов
        return $this;
    }

    /**
    Функция DELETE пушит в массив запроса sql DELETE 
     * @return $this
     */
    public function delete()
    {
        $this->clear();
        $this->sql['delete'] = "DELETE ";

        return $this;
    }

    /**
    Функция пушит в массив запроса sql FROM {$table} 
     * @param $table - какая таблица интерисует
     * @return $this
     */
    public function from($table)
    {
        $this->sql['from'] = "FROM {$table} ";

        return $this;
    }

    /**
    Функция пушит в массив запроса sql уточнение where
     * @param string $column - какая колонка
     * @param string $value - с чем сравниваем
     * @param string $operator - как? > < или = (По умолчанию =)
     * @return $this
     */
    public function where($column, $value, $operator = '=')
    {
    		//ключ where будет массивом (ведь таких where может быть несколько), который будет хранить подготовленное выр-ние 'имя колонки' 'оператор' ?
        $this->sql['where'][] = "{$column} {$operator} ?";
        // Пушим в массив значений переданные значения
        $this->values[] = $value;

        return $this;
    }

    /**
    Функция пушит в массив запроса sql сортировку ORDER BY {$field} {$order}
     * @param $field по какому полю
     * @param $order как
     * @return $this
     */
    public function orderBy($field, $order)
    {
        $this->sql['order_by'] = "ORDER BY {$field} {$order}";

        return $this;
    }

    /**
    Функция пушит в массив запроса sql ограничение  LIMIT {$number}
     * @param $number
     * @return $this
     */
    public function limit($number)
    {
        $this->sql['limit'] = " LIMIT {$number}";

        return $this;
    }

    /**
    Функция пушит в массив запроса sql обновление таблицы UPDATE {$table} 
     * @param $table - какой таблицы
     * @return $this
     */
    public function update($table)
    {
        $this->clear();
        $this->sql['update'] = "UPDATE {$table} ";

        return $this;
    }

		/**
    Функция пушит в массив запроса sql вставку INSERT INTO {$table} 
     * @param $table - в какую таблицу
     * @return $this
     */

    public function insert($table)
    {
        $this->clear();
        $this->sql['insert'] = "INSERT INTO {$table} ";

        return $this;
    }

    /**
    Функция пушит в массив запроса sql устанивить SET 
     * @param array $data
     * @return $this
     */
    public function set($data = [])
    {
        $this->sql['set'] .= "SET ";

        // Если были переданы параметры
        if(!empty($data)) {
            foreach ($data as $key => $value) {
            		// пуши в массив подготовленное выражение для каждого из них
                $this->sql['set'] .= "{$key} = ?";
                // Если после текущего параметра есть следущий то пушим и разделитель (,)
                if (next($data)) {
                    $this->sql['set'] .= ", ";
                }
                // В наш массив значений пушим текущее для ключа значение
                $this->values[]    = $value;
            }
        }

        return $this;
    }

    /**
    Функция собирает весь SQL запрос в одну строку
     * @return string
     */
    public function sql()
    {
    	// Начальная строка
        $sql = '';

        // Если массив запроса не пуст
        if(!empty($this->sql)) {
        	// То в цикле его перебераем
            foreach ($this->sql as $key => $value) {
            	// Если есть ключ 'where'
                if ($key == 'where') {
                	// Конкатенируем с WHERE
                    $sql .= ' WHERE ';
                    // И запускаем доп. цикл но уже по значениям массива $value 
                    foreach ($value as $where) {
                        $sql .= $where;
                        // Если таких WHERE больше одного, то добавляем разделитель AND
                        if (count($value) > 1 and next($value)) {
                            $sql .= ' AND ';
                        }
                    }
                } else {
                	// Если ключ не where то просто продалжаем конкатенировать значение
                    $sql .= $value;
                }
            }
        }
        // Теперь проверяем какого типа был запрос
        //Если SELECT то выбираем метод query из Database\Connection
        // Если нет - то write
        $pos = strrpos($sql, "SELECT");
        if (is_int($pos)) {
            return $this->db->query($sql, $this->values);
        } else {
            return $this->db->write($sql, $this->values);
        }

    }


}