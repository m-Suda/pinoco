<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2018/10/23
 * Time: 1:07
 */

require_once __DIR__.'/../../abstract_model/Company.php';

class Jobsupport extends Company
{

    function __construct($company_id = null)
    {
        if (is_null($company_id)) {
            return;
        }
    }

    public function select($company_id)
    {

    }

    public function insert($param)
    {

    }

    public function update($company_id, $param)
    {

    }

    public function delete($company_id)
    {

    }
}