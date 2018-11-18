<?php

/**
 * Abstract Class User
 */
abstract class User extends CI_Model
{
    protected $_name = null;
    protected $_id = null;
    protected $_auth = null;
    protected $_password = null;
    protected $_company_id = null;

    public function get_name()
    {
        return $this->_name;
    }

    public function get_id()
    {
        return $this->_id;
    }

    public function get_auth()
    {
        return $this->_auth;
    }

    public function get_password()
    {
        return $this->_password;
    }

    public function get_company_id()
    {
        return $this->_company_id;
    }

    public abstract function insert($param);
    public abstract function update($id, $param);
    public abstract function delete($id);
}