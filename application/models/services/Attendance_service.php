<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2019/01/03
 * Time: 15:57
 */

class Attendance_service extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $database = Database_constants::DATABASE;
        $this->load->model("infrastructure/database/${database}/trn_attendance");
    }


}