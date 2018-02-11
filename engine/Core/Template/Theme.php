<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 04.02.2018
 * Time: 16:39
 */

namespace Engine\Core\Template;


class Theme
{
    const RULES_NAME_FILE = [
        'header' => 'header-%s',
        'footer' => 'footer-%s',
        'sidebar' => 'sidebar-%s'
    ];

    public $url = '';
    protected $data = [];   // Контейнер, в который поместятся все переданные в тему параметры


    /*Функции header footer sidebar block нужны на случай если в шаблоне будут несколько футеров, шапок и т.д.
    В таком случае в эти функции нужно будет передать имена соотв-их файлов,
    Если же в теме одна шапка, или подвал то имя можно не писать. будут подключены файлы header.php / sidebar.php etc...
     * */

    /**
     * Фукнкция форматирования имени файла шапки
     * @param null $name
     * Запускает функцию загрузки файла по отформатированному имени
     */
    public function header($name = null)
    {
        $name = (string) $name; // Приводим имя к строке
        $target = 'header'; // Имя файла по умолчанию
        //Если строка не пуста, то форматируем строку по нашему шаблону
        if($name !== '') {
            $target = sprintf(self::RULES_NAME_FILE['header'], $name);
        }
        //и загружаем файл по полученному имени
        $this->loadTemplateFile($target);
    }

    /**
     * Функция аналогичная header
     * @param string $name
     */
    public function footer($name = '')
    {
        $name = (string) $name; // Приводим имя к строке
        $target = 'footer'; // Имя файла по умолчанию
        //Если строка не пуста, то форматируем строку по нашему шаблону
        if($name !== '') {
            $target = sprintf(self::RULES_NAME_FILE['footer'], $name);
        }
        //и загружаем файл по полученному имени
        $this->loadTemplateFile($target);

    }

    /**
     * Функция аналогичная header
     * @param string $name
     */
    public function sidebar($name = '')
    {
        $name = (string) $name; // Приводим имя к строке
        $target = 'sidebar'; // Имя файла по умолчанию
        //Если строка не пуста, то форматируем строку по нашему шаблону
        if($name !== '') {
            $target = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }
        //и загружаем файл по полученному имени
        $this->loadTemplateFile($target);

    }

    /**
     * Функция аналогичная header
     * @param string $name
     * @param array $data
     */
    public function block($name ='', $data = [])
    {
        $name = (string) $name;
        if($name !== '') {
            $this->loadTemplateFile($name, $data);
        }
    }

    /**
     * Функция загрузки файла шапки
     * @param $name Имя файла
     * @param array $data Если нужны, то и параметры
     * @throws \Exception
     * Подключает файл по полученному имени
     */
    public function loadTemplateFile($name, $data = [])
    {
        if(ENV === 'Admin') {
            $template = ROOT . '\\view\\' . $name . '.php';
        } else {
            $template = ROOT . '\\content\\themes\\default\\' . $name . '.php';
        }

        if(is_file($template)) {
            // Обьединяем глобальный массив параметров data с $this->data - массивом пар-ов, которые могут передать при рендере
            extract(array_merge($data, $this->data));
            require_once $template;
        } else {
            throw new \Exception(sprintf('Файл шаблона %s не существует', $template));
        }
    }

    /**
     * Получить все переданные в тему параметры
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Установить параметры
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}