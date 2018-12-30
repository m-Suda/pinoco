<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2018/11/03
 * Time: 3:38
 */

require_once __DIR__.'/../../abstract_model/User.php';

class Consignor extends User
{

    function __construct($user = null)
    {
        if (is_null($user)) {
            return;
        }

        parent::__construct($user);
    }

}