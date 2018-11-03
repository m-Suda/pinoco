<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2018/11/03
 * Time: 3:41
 */

require_once __DIR__.'/Factory.php';

class Employee_factory extends Factory
{

    public function create($user_auth, $user_id, $company_id)
    {

        // ユーザーの所属部署を取得
        $division = new Division($user_id);

        // 営業部なら営業部インスタンスを生成
        if ($division->is_sales_department()) {

            $this->user = new Sales_department($user_id);
        }

        // システム開発部なら開発部インスタンスを生成
        if ($division->is_system_development_department()) {

            $this->user = new System_development_department($user_id);
        }

        return $this->user;
    }

}