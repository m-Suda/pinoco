<?php
/**
 * Created by PhpStorm.
 * User: masak
 * Date: 2019/01/04
 * Time: 13:26
 */

class Database_constants extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * 使用しているデータベースを表す定数
     */
    const DATABASE = 'mysql';

    /**
     * 削除されている状態を表す定数
     */
    const IS_DELETED = 1;

    /**
     * 削除されていない状態を表す定数
     */
    const IS_NOT_DELETED = 0;

}
