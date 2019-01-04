<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2019/01/03
 * Time: 15:49
 */

class User_service extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $database = Database_constants::DATABASE;
        $this->load->model("infrastructure/database/${database}/mst_user");
        $this->load->model('view_model/user_view_model', 'vm');
    }

    public function fetch_user_all()
    {
        $user_list = $this->mst_user->select_all();
        $output_user_list = [];

        foreach ($user_list as $key => $user) {
            $user['user_auth_name'] = $this->auth_num_to_name($user['user_auth']);
            $output_user_list[$key] = $user;
        }

        return $output_user_list;
    }

    public function auth_num_to_name($auth_num)
    {
        $auth_name = [
            User_constants::ADMINISTRATOR => '管理者'
          , User_constants::CONSIGNOR     => '外部法人'
          , User_constants::EMPLOYEE      => 'job社員'
          , User_constants::TRAINEE       => '研修生'
        ];

        return $auth_name[$auth_num];
    }

}