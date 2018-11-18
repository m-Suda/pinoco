<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2018/11/03
 * Time: 3:20
 */

require_once __DIR__.'/Factory.php';

class User_factory extends CI_Model implements Factory
{

    private $_user = null;

    function __construct($user_id = null)
    {

        if (is_null($user_id)) {
            return;
        }

        $this->_user = $this->_fetch_user($user_id);
    }

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
    public function create()
    {

        $user = $this->_user;

        if (is_null($user)) {
            return null;
        }

        switch ($user['user_auth']) {

            // 管理者権限
            case User_constants::ADMINISTRATOR:
                return new Administrator($user);

            // 法人様権限
            case User_constants::CONSIGNOR:
                return new Consignor($user);

            // 研修生権限
            case User_constants::TRAINEE:
                $factory = new Trainee_factory($user);
                return $factory->create();

            default:
                return null;
        }
    }

    /**
     * ユーザーIDからユーザーを1件取得する。
     * @param $user_id
     * @return array
     */
    private function _fetch_user($user_id)
    {
        // select
        $this->db->select('
            user_id
          , user_name
          , user_auth
          , company_id
          , password
        ');
        // from
        $this->db->from('mst_user');
        // where
        $this->db->where('user_id', $user_id);
        $this->db->where('is_delete', Constants::IS_NOT_DELETED);

        $result = $this->db->get()->result_array();

        return count($result) !== 0 ? $result[0] : null;
    }
}