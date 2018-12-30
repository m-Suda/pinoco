<?php

/**
 * Abstract Class User
 */
abstract class User extends CI_Model
{
    protected $_name = '';
    protected $_id = '';
    protected $_auth = 0;
    protected $_password = '';
    protected $_company_id = '';
    protected $_email = '';

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

    public function get_email()
    {
        return $this->_email;
    }

}