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

    function __construct($user_id = null)
    {
        if (is_null($user_id)) {
            return;
        }

        $admin_user = $this->select($user_id);

        $this->_id = $admin_user['id'];
        $this->_name = $admin_user['name'];
    }

    public function get_name()
    {
        return $this->_name;
    }

    public function select($id)
    {
        // TODO: Implement select() method.
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