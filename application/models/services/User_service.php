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
        $this->load->model('infrastructure/database/mysql/mst_user', 'MST_USER');
    }

}