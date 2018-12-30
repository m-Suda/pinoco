<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2018/11/03
 * Time: 0:48
 */

class Authentication extends CI_Model
{
    private $_authentication_result = false;

    /**
     * インスタンス生成と同時に認証を行う。
     * Authentication constructor.
     * @param null $input_id
     * @param null $input_password
     * @param null $user
     */
    function __construct($input_id = null, $input_password = null, $user = null)
    {
        parent::__construct();

        if (is_null($input_id) || is_null($input_password) || is_null($user)) {
            return;
        }

        if ($input_id !== $user->get_id()) {
            return;
        }

        if ($input_password !== $user->get_password()) {
            return;
        }

        $this->_authentication_result = true;
    }

    /**
     * 認証結果を返却する。
     * @return bool
     */
    public function is_passed()
    {
        return $this->_authentication_result;
    }

}