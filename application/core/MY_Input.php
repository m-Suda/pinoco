<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Input extends CI_Input {

    function __construct() {
        parent::__construct();
    }

    function is_post()
    {
        return ($this->server('REQUEST_METHOD') === 'POST');
    }

    function set_post($key, $value) {

        $_POST[$key] = $value;
    }
}