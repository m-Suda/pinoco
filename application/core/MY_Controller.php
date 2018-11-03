<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function __construct() {

		parent::__construct();

		$profiler = $this->config->item("profiler");
		$this->load->helper('form');

		if (!$this->input->is_ajax_request()) {
			$this->output->enable_profiler($profiler);
		}

		$account_data = $this->session->userdata("account_data");

		if (empty($account_data)) {
			redirect(base_url('login'), 'refresh');
		}
	}

    /**
     * バリデーションエラーメッセージを作成する
     */
	protected function get_validation_errors()
    {
        $ret = [];

        foreach ($this->form_validation->error_array() as $name => $error_string) {
            $ret['errors'][$name] = form_error($name, '※', null);
        }

        return $ret;
    }
}