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
        $database = Database_constants::DATABASE;
        $this->load->model("infrastructure/database/${database}/mst_user");
    }

    public function authentication($user_id, $password)
    {

        $user = $this->mst_user->select_once($user_id);
        if (!$user || $user['password'] !== $password) {
            return false;
        }

        $this->set_session($user);

        return true;
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