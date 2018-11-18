<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2018/10/23
 * Time: 0:46
 */

require_once __DIR__.'/../../abstract_model/User.php';

class Administrator extends User
{

    function __construct($user = null)
    {
        if (is_null($user)) {
            return;
        }

        $this->_id = $user['user_id'];
        $this->_name = $user['user_name'];
        $this->_auth = $user['user_auth'];
        $this->_password = $user['password'];
    }

    public function insert($param)
    {
        // TODO: Implement insert() method.
    }

    public function update($id, $param)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}