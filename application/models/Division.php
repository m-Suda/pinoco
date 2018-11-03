<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2018/11/03
 * Time: 3:47
 */

class Division
{

    private $_division;

    function __construct($user_id = null)
    {
        if (is_null($user_id)) {
            return;
        }

        $this->_division = $this->_fetch_division($user_id);
    }

    /**
     * ユーザーが営業部であるかを伝える
     * @return bool
     */
    public function is_sales_department()
    {
        // divisionが営業部かどうかの判定式をreturnする
        return true;
    }

    /**
     * ユーザーがシステム開発部であるかを伝える
     * @return bool
     */
    public function is_system_development_department()
    {
        // divisionがシステム開発部かどうかの判定をreturnする
        return true;
    }

    /**
     * ユーザーの部署を取得する
     * @param $user_id
     */
    private function _fetch_division($user_id)
    {
        // 部署取得処理
    }


}