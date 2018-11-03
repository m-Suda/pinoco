<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @file paging.php
 * @brief 共通クラス
 *
 * 各検索画面のページング処理を行うクラス。<br>
 *
 * @date 2016/09/1 新規作成
 *
 * @author	Boncre
 */
class Paging extends CI_Model {

  function __construct() {
    parent::__construct();

    $this->display_num = $this->constants->display_num();
  }

  /**
   * Index
   * @param
   * @return
   */
    function index() {

    }

    /**
     * 各検索サービス(ページング)
     * @param
     * @return
     */
    function paging($pageno,$count) {

      $display_num = $this->display_num;
      $first_item = ($pageno - 1) * $display_num + 1;
      $end_item = $pageno * $display_num;

      ///総ページ数が1ページの場合
      if($count <= $display_num) {
        $first_item = 1;
        $end_item = $count;

      };

      ///取得件数0件
      if($count <= 0) {
        $first_item = 0;
        $end_item = 0;

      };

      ///最終ページ用調整
      if($count < $end_item) {
        $end_item = $count;

      };

      $page = array(
          'first'=>$first_item,
          'end'=>$end_item
      );

      return $page;
    }

    /**
     * 在庫一覧検索サービス(ページング)
     * @param
     * @return
     */
    function item_paging($pageno,$count) {

    	$display_num = $this->constants->item_display_num();
    	$first_item = ($pageno - 1) * $display_num + 1;
    	$end_item = $pageno * $display_num;

    	///総ページ数が1ページの場合
    	if($count <= $display_num) {
    		$first_item = 1;
    		$end_item = $count;

    	};

    	///取得件数0件
    	if($count <= 0) {
    		$first_item = 0;
    		$end_item = 0;

    	};

    	///最終ページ用調整
    	if($count < $end_item) {
    		$end_item = $count;

    	};

    	$page = array(
    			'first'=>$first_item,
    			'end'=>$end_item
    	);

    	return $page;
    }
}
  ?>