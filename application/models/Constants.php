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
     * 削除されている状態を表す定数
     */
    const IS_DELETED = 1;

    /**
     * 削除されていない状態を表す定数
     */
    const IS_NOT_DELETED = 0;

    /**
     * 使用されている状態を表す定数
     */
    const IS_USING = 1;

    /**
     * 使用されていない状態を表す定数
     */
    const IS_UNUSED = 0;

    /**
     * 企業名
     */
    const JOB_SUPPORT = 'jobsupport';
}