<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 04.02.2018
 * Time: 18:50
 */

namespace Admin\Controller;

use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;
use Engine\Core\Database\QueryBuilder;

/**
 * Класс, отвечающий за логику авторизации
 * Class LoginController
 * @package Admin\Controller
 */

class LoginController extends Controller
{
    protected $auth;

    public function __construct(DI $di)
    {
        // Вызываем конструктор родительского класса
        parent::__construct($di);
        //Создаем новый экземпляр класса Авторизации
        $this->auth = new Auth();
        //Проверяем, есть ли у нас запись в $hash_user в классе Auth. Если есть - значит юзер уже регистррировался ранее. Перенаправляем его в админку
        //Если нет - ничего не делаем
        if($this->auth->getHashUser() !== null) {
            header('Location: /admin/');
            exit;
        }
    }

    /**
     *  Функция рендера вида login
     */
    public function form()
    {
        // Рендер вида Форм
        $this->view->render('login');
    }


    /**
     *Функция авторизации админа
     */
    public function authAdmin()
    {
        // Получаем все параметры из $_POST
        $params = $this->request->post;


        // Кодируем пароль
        $password = md5($params['password']);

        // Находим юзера, соответствующего введенным данным
        // Строим sql запрос
        $query = $this->queryBuilder
           ->select()
           ->from('users')
           ->where('email', $params['email'])
           ->where('password', $password)
           ->limit(1)
           ->sql();
       // И выполняем его
       // $query = $this->db->query($sql, $queryBuilder->values);

        // Если нашли
        if( !empty($query)) {
            // То проверяем какая роль у данного юзера (интерисует admin)
            $user = $query[0];
            if($user['role'] === 'admin') { // Если все ок и это админ
                // Кодируем его данные в хеш строку , добавляем соль из рандомного числа $this->auth->salt() и его ID чтоб хешь всегда был 100% уникальный
                $hash = (string) md5($user['id'] . ['email'] . $user['password'] . $this->auth->salt());

                // Записываем строку хеша в таблицу  юзеров нашему админу
                $this->queryBuilder
                    ->update('users')
                    ->set(['hash' => $hash])
                    ->where('id', $user->id)->sql();
               // $this->db->write($sql, $queryBuilder->values);
                //$this->db->write("UPDATE users SET hash = '$hash' WHERE id = '{$user['id']}'");

                // Запускаем функцию авторизации с данным хешем
                $this->auth->authorize($hash);
                // И перенаправляем на админку
                header('Location: /admin/');
                exit;
            }
        } else {
            // Если юзера с таким именем или паролем нет то возращаем на авторизацию
            header('Location: /admin/login/');
        }

    }

}