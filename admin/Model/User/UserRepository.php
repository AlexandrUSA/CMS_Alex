<?php
/**
 * Created by PhpStorm.
 * User: Гриневичи
 * Date: 05.02.2018
 * Time: 9:53
 */
namespace Admin\Model\User;

use Engine\Model;


/**
 * Class UserRepository
 * Тут будут хранится все методы работы с юзерами
 * @package Admin\Model\User
 */
class UserRepository extends Model
{
    public function getUsers()
    {

        $sql = $this->queryBuilder->select()
            ->from('users')
            ->orderBy('id', 'DESC')
            ->sql();
        return $sql;
    }

    public function test()
    {
        $user = new User;
        $user
             ->setName('New')
             ->setLastname('Very New')
             ->setPassword(md5(rand(1,20)))
             ->setEmail('NewEmail@test.ru')
             ->setRole('user')
             ->save();
        echo 12;
    }

}