<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @file exclusive.php
 * @brief 共通クラス
 *
 * 在庫数変動に関する排他制御を管理するクラス。<br>
 *
 * @date 2016/09/1 新規作成
 *
 * @author	Boncre
 */
class Exclusive extends CI_Model {

  private $init = array();

  function __construct() {
    parent::__construct();
  }

  /**
   * Index
   */
  public function index() {

  }

  /**
   * 入れ替え
   * @param
   * @return
   */
  function catch_exclusive($detail) {

    ///情報の整形
    $account = $this->session->userdata('account_data');
    $input_data = array((int)$detail['stock_id'],(int)$account['sys_user_id']);

    ///削除処理
    $this->exclusive->clear_exclusive($input_data);

    $input_data = array(
        (int)$detail['stock_id'],
        (int)$account['sys_user_id'],
        $detail['update_date'],
        (int)$account['sys_user_id'],
        (int)$account['sys_user_id']
    );

    ///登録処理
    $this->exclusive->hold_exclusive($input_data);

    return;
  }

  /**
   * 比較
   * @param
   * @return
   */
  function check_exclusive($item_id) {

    ///DB側のデータ更新日付を取得
    $db_data = $this->d_item->search_item_detail($item_id);
    $db_date = $db_data['update_date'];

    ///画面側のデータ更新日付を取得
    $view_data = $this->get_exclusive($db_data['stock_id']);
    $view_date = $view_data['data_date'];

    ///排他制御チェック
    if($view_date != $db_date) {

      return false;
    }

    return true;
  }

  /**
   * 生成
   */
  public function hold_exclusive($user_data) {

    ///入力した検索条件をSQL文の形式に編集<br>
    $sql = "INSERT INTO
              t_stock_exclusive
            (
              stock_infomation_id,
              sys_user_id,
              data_date,
              create_date,
              create_user_id,
              update_date,
              update_user_id
            )
            VALUES (
              ?,
              ?,
              ?,
              NOW(),
              ?,
              NOW(),
              ?
            );";

    ///SQL文を実行<br>
    $this->db->query($sql,$user_data);

    return;
  }

  /**
   * 解放
   */
  public function clear_exclusive($user_data) {

    ///入力した検索条件をSQL文の形式に編集<br>
    $sql = "DELETE FROM
              t_stock_exclusive
            WHERE
              stock_infomation_id = ?
            AND
              sys_user_id = ?;";

    ///SQL文を実行<br>
    $this->db->query($sql,$user_data);

    return;
  }

  /**
   * データ更新日時取得
   */
  public function get_exclusive($stock_id) {

    $account = $this->session->userdata('account_data');


    ///入力した検索条件をSQL文の形式に編集<br>
    $sql = "SELECT
              data_date
            FROM
              t_stock_exclusive
            WHERE
              stock_infomation_id = ?
            AND
              sys_user_id = ?";

    $value = array($stock_id,$account['sys_user_id']);

    ///SQL文を実行<br>
    $update_date = $this->db->query($sql,$value)->row_array();

    return $update_date;
  }
}
  ?>