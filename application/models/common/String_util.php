<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class String_util extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    //css、jsファイル更新時、キャッシュさせないようにファイル名を変更したように見せかける用
    function cacheBuster($filename)
    {
        if (file_exists($filename)) {
            echo date('YmdHis', filemtime($filename));
        } else {
            echo 'file not found';
        }
    }

}