<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2018/11/03
 * Time: 0:48
 */

class Authentication extends CI_Model
{
    private $_user;
    private $_authentication_result = false;

    function __construct($user_id = null, $password = null)
    {
        parent::__construct();

        if (is_null($user_id) || is_null($password)) {
            return;
        }

        $user_data = $this->_fetch_user($user_id, $password);
        if (empty($user_data)) {
            return;
        }

        $this->_authentication_result = true;
        $factory = new User_factory();
        $this->_user = $factory->create($user_data['user_auth'], $user_data['user_id'], $user_data['company_id']);
    }

    /**
     * 認証結果を通知する。
     * @return bool
     */
    public function is_authorization_passed()
    {
        return $this->_authentication_result;
    }

    /**
     * 認証が通ったユーザーのデータを渡す。
     * @return Administrator
     */
    public function get_user()
    {
        return $this->_user;
    }

    /**
     * ユーザーIDからユーザーを1件取得する。
     * @param $user_id
     * @return array
     */
    private function _fetch_user($user_id, $password)
    {
        // select
        $this->db->select('
            user_id
          , user_name
          , user_auth
          , company_id
        ');
        // from
        $this->db->from('mst_user');
        // where
        $this->db->where('user_id', $user_id);
        $this->db->where('password', $password);
        $this->db->where('is_delete', Constants::IS_NOT_DELETED);

        $result = $this->db->get()->result_array();

        return count($result) !== 0 ? $result[0] : [];
    }

}