<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2018/11/03
 * Time: 3:20
 */

require_once __DIR__.'/Factory.php';

class User_factory extends Factory
{

    /**
     * ログインされるユーザーインスタンスを生成する
     * @param $user_auth
     * @param $user_id
     * @param $company_id
     * @return Administrator
     *        |Consignor
     *        |External_trainee
     *        |Jobsupport_trainee
     *        |Sales_department
     *        |System_development_department
     */
    public function create($user_auth, $user_id, $company_id)
    {

        switch ($user_auth) {

            // 管理者権限
            case Constants::ADMINISTRATOR:
                $this->user = new Administrator($user_id);
                break;

            // 法人様権限
            case Constants::CONSIGNOR:
                $this->user = new Consignor($user_id);
                break;

            // job社員権限
            case Constants::EMPLOYEE:
                $factory = new Employee_factory();
                $this->user = $factory->create($user_auth, $user_id, $company_id);
                break;

            // 研修生権限
            case Constants::TRAINEE:
                $factory = new Trainee_factory();
                $this->user = $factory->create($user_auth, $user_id, $company_id);
                break;

            default:
                break;
        }

        return $this->user;
    }
}