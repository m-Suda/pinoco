<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2018/11/03
 * Time: 3:03
 */

abstract class Factory
{
    protected $user;

    abstract function create($user_auth, $user_id, $company_id);
}