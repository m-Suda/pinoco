<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2018/11/03
 * Time: 4:05
 */

require_once __DIR__.'/Factory.php';

class Trainee_factory implements Factory
{

    private $_user = null;

    function __construct($user = null)
    {
        if (is_null($user)) {
            return;
        }

        $this->_user = $user;
    }

    function create()
    {

        $user = $this->_user;

        // ジョブサポートの研修生
        if ($user['company_id'] === Constants::JOB_SUPPORT) {
            return new Jobsupport_trainee($user);
        }

        // 外部の研修生
        return new External_trainee($user);
    }

}