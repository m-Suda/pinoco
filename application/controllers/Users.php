<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('services/user_service', 'User');
    }

    /**
     * ユーザー一覧初期表示
     */
    public function index()
    {

        $data['users'] = $this->User->fetch_user_all();

        $data['title'] = "ユーザー一覧";
        $data['menu'] = $this->load->view('common/v_menu', $data, TRUE);
        $data['contents'] = $this->load->view('users/index', $data, TRUE);
        $this->load->view('common/v_base', $data);
    }
}