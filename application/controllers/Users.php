<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * ユーザー一覧初期表示
     */
    public function index()
    {

        $data['users'] = [
            [
                'user_id' => 'hoge',
                'user_type_name' => '管理者',
                'user_name' => '管理者ほげほげさん',
                'company_name' => 'JobSupport',
                'mail_address' => 'hogehoge@gmail.com'
            ]
        ];

        $data['title'] = "ユーザー一覧";
        $data['menu'] = $this->load->view('common/v_menu', $data, TRUE);
        $data['contents'] = $this->load->view('users/index', $data, TRUE);
        $this->load->view('common/v_base', $data);
    }
}