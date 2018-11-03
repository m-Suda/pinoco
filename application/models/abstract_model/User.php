<?php

/**
 * Abstract Class User
 */
abstract class User extends CI_Model
{
    protected $_name = '';
    protected $_id = '';

    public abstract function select($id);
    public abstract function insert($param);
    public abstract function update($id, $param);
    public abstract function delete($id);
}