<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2018/11/03
 * Time: 4:12
 */

require_once __DIR__.'/../../../abstract_model/User.php';

class Jobsupport_trainee extends User
{

    function __construct($user = null)
    {
        if (is_null($user)) {
            return;
        }

        parent::__construct($user);
    }

}