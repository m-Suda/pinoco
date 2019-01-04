<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('services/auth_service', 'Auth');

        $profiler = $this->config->item("profiler");

        if (!$this->input->is_ajax_request()) {
            $this->output->enable_profiler($profiler);
        }
    }
	
    /**
     * ログイン画面初期表示
     * @date 2016/06/30
     */
    public function index()
    {

        $data['title'] = "ログイン";
        $data['contents'] = $this->load->view('login', $data, TRUE);
        $this->load->view('common/v_base', $data);

    }

    /**
     * ログインボタン押下時
     */
    public function authentication()
    {

        // ajaxリクエスト以外は404エラー
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // 入力値チェック
        if (!$this->_validation_check()) {
            echo json_encode($this->_get_validation_errors());
            return;
        }

        $post = $this->input->post();

        $user_auth = $this->Auth->authentication($post['user_id'], $post['password']);

        if (!$user_auth) {
            echo json_encode(['errors' => ['authentication' => '認証に失敗しました。']]);
            return;
        }

        echo json_encode(['type' => $user_auth]);

    }

    /**
     * バリデーションチェックを行う
     * @return bool
     */
	private function _validation_check()
    {
        $this->form_validation->set_rules([
            [
                'field' => 'user_id'
              , 'label' => 'ユーザーID'
              , 'rules' => 'callback__illegality_character|required'
            ],
            [
                'field' => 'password'
              , 'label' => 'パスワード'
              , 'rules' => 'callback__illegality_character|required'
            ]
        ]);

        return $this->form_validation->run();
    }

    /**
     * 禁則文字が使われていないかチェックする。
     * @param $string
     * @return bool
     */
    public function _illegality_character($string)
    {

        if (preg_match('/[!?#<>:;&~@%+$"\'\*\^\(\)\[\]\|\/\.,_ -]/', $string)) {
            $this->form_validation->set_message('_illegality_character', '{field} に禁則文字が含まれています。');
            return FALSE;
        }

        return TRUE;
    }

    /**
     * バリデーションエラーメッセージを作成する
     */
    private function _get_validation_errors()
    {
        $ret = [];

        foreach ($this->form_validation->error_array() as $name => $error_string) {
            $ret['errors'][$name] = form_error($name, '※', null);
        }

        return $ret;
    }

}