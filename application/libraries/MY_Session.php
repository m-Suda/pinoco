<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Session extends CI_Session {

    var $no_login  = true;

    function __construct() {
        parent::__construct();

    }

    function new_flashdata($key)
    {
        $flashdata_key = $this->flashdata_key.':new:'.$key;
        return $this->userdata($flashdata_key);
    }

    function new2old_flashdata($key)
    {

        $flashdata_key = $this->flashdata_key.':new:'.$key;

        $flashdata_value = $this->userdata($flashdata_key);

        if ($flashdata_value)
        {
            $new_name = $this->flashdata_key.':old:'.$key;
            $this->set_userdata($new_name, $flashdata_value);
            $this->unset_userdata($flashdata_key);
        }
    }
}