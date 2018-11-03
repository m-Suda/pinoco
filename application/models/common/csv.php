<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @file csv.php
 * @brief 共通クラス
 *
 * 画面の表示内容(検索結果)をCSV出力するクラス。<br>
 *
 * @date 2016/09/20 新規作成
 *
 * @author	Boncre
 */
class Csv extends CI_Model {

  function __construct() {
    parent::__construct();

    $this->load->model('component/d_item', '', TRUE);
    $this->load->model('common/exclusive', '', TRUE);

    $this->display_num = $this->constants->display_num();

  }

  /**
   * CSV出力サービス
   * @param
   * @return
   */
  function csv($csv_name,$result_header,$result_list) {

    ///mb_convert_variables ( string $to_encoding , mixed $from_encoding , mixed &$vars [, mixed &$... ] )

    ///ファイル名の指定
    $name_str = $csv_name."_".date('YmdHis').".csv";
    mb_convert_encoding($name_str, 'sjis-win', 'utf8');		///SJIS→UTF-8に文字コード変換
    $fname = $name_str;										///ファイル名用変数に文字列を格納

    ///ファイルオープン(新規)
    $stream = fopen('php://output', 'w');

    ///HTTPヘッダ設定
    header('Content-Disposition: inline; filename="'.$fname.'"');	///ファイル名指定(ダイアログで使用)
    header('Content-Type: application/octet-stream');				///ダウンロードダイアログを開く
    if(isset($result_header) && !empty($result_header)){
    ///ヘッダ出力①(共通)
    mb_convert_variables('sjis-win', 'utf-8', $result_header);		///配列をUTF-8→SJISに文字コード変換
    $csv_header = $result_header;

    ///ヘッダ書き込み
    fputcsv($stream, $csv_header);
    }

    ///データ書き込み
    foreach($result_list as $r){
      $csv_row = array();								///CSV一行分データ格納用配列

      mb_convert_variables('sjis-win', 'utf-8', $r);	///配列をUTF-8→SJISに文字コード変換
      $csv_row = $r;									///CSV用変数配列に値を書き込む

//      $csv_str = implode(",", $r);						///連想配列一行をカンマによって文字列として連結する
//      $csv_r = explode(",", $csv_str);					///文字列をカンマによって配列化する(一次元配列)

//      foreach($csv_r as $csv) {						///シングルクォーテをつけて配列再格納
//        array_push($csv_row, $csv);

//      }

      fputcsv($stream, $csv_row);						///一行分($csv_row)をCSVに書き込み
    }

    ///ファイルクローズ
    fclose($stream);
    exit;
  }
}
?>