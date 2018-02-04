<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 04.02.2018
 * Time: 19:57
 */

namespace Engine\Core\Auth;
use Engine\Core\Cookie;

/**
 * Class Auth
 * @package Engine\Core\Auth
 */

class Auth implements AuthInterface
{
    protected $authorized = false,
              $user;

    /**
     * @return bool
     */
    public function isAuthorized()
    {
        return $this->authorized;
    }

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->user;
    }


    /**
     * Функция авторизации
     * Записывает куки
     * @param $user
     */
    public function authorize($user)
    {
        Cookie::set('auth.authorized', true);
        Cookie::set('auth.user', $user);
        $this->authorized = true;
        $this->user       = $user;
    }

    /**
     * Функция выхода
     * удаляет куки
     */
    public function unAuthorize()
    {
        Cookie::delete('auth.authorized');
        Cookie::delete('auth.user');
        $this->authorized = false;
        $this->user       = null;
    }

    /**
     * При создании хеша пароля поможет избежать совпадений
     * Генерируует дополнене к паролю
     * @return string
     */
    public static function salt()
    {
        return (string) hash(10000000, 9999999);
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