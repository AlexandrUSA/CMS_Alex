<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 23:12
 */

namespace Engine\Core\Template;

class View
{
    public function __construct()
    {
    }

    /**
     * Функция рендера нового вида
     * @param $tmp - имя нужного шаблона
     * @param array $parameters все необходимые параметры
     */
    public function render($tmp, $parameters = [])
    {
        // Название тем дальше сделаю автоматическим, пока для тестов захардкодил
        $tmpPath = ROOT . '\\content\\themes\\default\\' . $tmp . '.php';
        if( !is_file($tmpPath)) {
            throw new \InvalidArgumentException(sprintf('Шаблон "%s" не найден в директории "%s"', $tmp, $tmpPath));
        }
        // Распарсим все эл-ты массивы в переменные
        extract($parameters);
        // Включаем буфферизацию для рендера
        ob_start();
        // Отключаем его неявную очистку
        ob_implicit_flush(0);

        try {
            require  $tmpPath;
        } catch (\ErrorException $e) {
            echo $e->getMessage();
            ob_end_clean(); // Очищаем буффер при неудаче
        }
        // Если все ок - выводим все содержимое текущего буффера
        echo ob_get_clean();
    }
}








