<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2018/11/03
 * Time: 4:05
 */

require_once __DIR__.'/Factory.php';

class Trainee_factory extends Factory
{

    function create($user_auth, $user_id, $company_id)
    {

        // ジョブサポートの研修生
        if ($company_id === Constants::JOB_SUPPORT) {
            return new Jobsupport_trainee($user_id);
        }

        // 外部の研修生
        return new External_trainee($user_id);
    }

}