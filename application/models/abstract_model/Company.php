<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2018/10/23
 * Time: 1:03
 */

abstract class Company extends CI_Model
{

    protected $_company_name;
    protected $_company_name_kana;
    protected $_tel;
    protected $_mail_address;
    protected $_zip;
    protected $_address;

    public abstract function select($company_id);
    public abstract function insert($param);
    public abstract function update($company_id, $param);
    public abstract function delete($company_id);
}