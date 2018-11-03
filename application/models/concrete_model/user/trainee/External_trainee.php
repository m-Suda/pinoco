<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2018/11/03
 * Time: 4:13
 */

require_once __DIR__.'/../../../abstract_model/User.php';

class External_trainee extends User
{

    function __construct($user_id = null)
    {
        if (is_null($user_id)) {
            return;
        }
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