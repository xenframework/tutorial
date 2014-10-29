<?php
/**
 * xenFramework (http://xenframework.com/)
 *
 * This file is part of the xenframework package.
 *
 * (c) Ismael Trascastro <itrascastro@xenframework.com>
 *
 * @link        http://github.com/xenframework for the canonical source repository
 * @copyright   Copyright (c) xenFramework. (http://xenframework.com)
 * @license     MIT License - http://en.wikipedia.org/wiki/MIT_License
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace main\models;

use xen\db\Adapter;

/**
 * Class UsersModel
 *
 * @package models
 * @author  Ismael Trascastro itrascastro@xenframework.com
 *
 * @var Adapter $_db Database connection
 *
 */
class UsersModel
{
    /**
     * @var Adapter
     */
    private $_db;

    public function __construct()
    {
    }

    /**
     * setDb
     *
     * Description
     *
     * @param Adapter $_db
     */
    public function setDb(Adapter $_db)
    {
        $this->_db = $_db;
    }

    public function add($email, $password)
    {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $query = $this->_db->prepare($sql);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
    }

    public function all()
    {
        $sql = "SELECT * FROM users";
        $query = $this->_db->prepare($sql);
        $query->execute();

        $users = array();

        while ($row = $query->fetch(Adapter::FETCH_OBJ))
        {
            $users[] = new UserModel($row->id, $row->email, $row->password, $row->role);
        }

        return $users;
    }

    public function remove($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $query = $this->_db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $query = $this->_db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();

        $row = $query->fetch(Adapter::FETCH_ASSOC);

        $user = new UserModel($row['id'], $row['email'], $row['password'], $row['role']);

        return $user;
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $query = $this->_db->prepare($sql);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();

        if ($row = $query->fetch(Adapter::FETCH_ASSOC)) {
           return new UserModel($row['id'], $row['email'], $row['password'], $row['role']);
        }

        return null;
    }

    public function update($id, $email, $password, $role)
    {
        $sql = "UPDATE users SET email = :email, password = :password, role = :role WHERE id = :id";
        $query = $this->_db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':role', $role);
        $query->execute();
    }
}