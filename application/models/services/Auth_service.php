<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2019/01/03
 * Time: 16:06
 */

class Auth_service extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('infrastructure/database/mysql/mst_user', 'MST_USER');
    }

    public function authentication($user_id, $password)
    {

        $user = $this->MST_USER->select_once($user_id);
        if (!$user || $user['password'] !== $password) {
            return 0;
        }

        $this->set_session($user);

        return $user['user_auth'];
    }

    private function set_session($user)
    {

        $user_data = [
            'user_name'  => $user['user_name'],
            'user_id'    => $user['user_id'],
            'user_auth'  => $user['user_auth'],
            'company_id' => $user['company_id'],
            'user_email' => $user['email']
        ];
        $this->session->set_userdata('user', $user_data);

    }
}