<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * システム定数を配置するクラス
 * @author Masaki Suda
 */
class Constants extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * 企業名
     */
    const JOB_SUPPORT = 'jobsupport';
}