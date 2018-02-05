<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 04.02.2018
 * Time: 19:57
 */

namespace Engine\Core\Auth;
use Engine\Helper\Cookie;

/**
 * Чисто вспомогательный базовый класс . Основная логика (проверка паролей и прочее) будет в контроллерах и моделях
 * Class Auth
 * @package Engine\Core\Auth
 */

class Auth implements AuthInterface
{
    protected $authorized = false,
              $hash_user;

    /**
     * Проверка на авторизацию
     * @return bool
     */
    public function isAuthorized()
    {
        return $this->authorized;
    }

    /**
     * @return mixed
     */
    public function getHashUser()
    {
        return Cookie::get('auth_user');
    }


    /**
     * Функция авторизации
     * Записывает куки
     * @param $user
     */
    public function authorize($user)
    {
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', $user);
    }

    /**
     * Функция выхода
     * удаляет куки
     */
    public function unAuthorize()
    {
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');
    }

    /**
     * При создании хеша пароля поможет избежать совпадений
     * Генерируует дополнене к паролю
     * @return string
     */
    public function salt()
    {
        return (string) rand(10000000, 99999999);
    }

    /**
     * Функция создания хеша для пароля
     * @param $password
     * @param string $salt
     * @return string
     */
    public static function encryptPassword($password, $salt = '')
    {
        return hash('sha256', $password . $salt );
    }

}