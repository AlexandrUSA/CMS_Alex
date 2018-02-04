<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 03.02.2018
 * Time: 23:12
 */

namespace Engine\Core\Template;
use Engine\Core\Template\Theme;

class View
{
    /**
     * @var \Engine\Core\Template\Theme
     */
    protected $theme;

    /**
     * View constructor.
     */
    public function __construct()
    {
        // При инициализации создаем новый экземпляр класса Тема
        $this->theme = new Theme();
    }

    /**
     * Функция рендера нового вида
     * @param $tmp - имя нужного шаблона
     * @param array $parameters все необходимые параметры
     */
    public function render($tmp, $parameters = [])
    {
        // Название тем дальше сделаю автоматическим, пока для тестов захардкодил
            $tmpPath = $this->getTmpPath($tmp, ENV);
        // $tmpPath = ROOT . '\\content\\themes\\default\\' . $tmp . '.php';
        if( !is_file($tmpPath)) {
            throw new \InvalidArgumentException(sprintf('Шаблон "%s" не найден в директории "%s"', $tmp, $tmpPath));
        }
        // Получаем все переменные из массива data (переданные в контроллере)
        $this->theme->setData($parameters);
        // Распарсим все эл-ты массива $parameters в переменные
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

    /**
     * Функция определения текущего окружения
     * в зав-сти от $env возращает шаблоны из разных путей, соответствующих окружению
     * @param $tmp
     * @param $env
     * @return string
     */
    public function getTmpPath($tmp, $env)
    {
        return $env === 'Cms' ? ROOT  . '/content/themes/default/' . $tmp . '.php' : ROOT . '/View/' . $tmp . '.php';
    }
}








