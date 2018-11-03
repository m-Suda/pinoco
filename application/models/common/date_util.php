<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @file user_util.php
 * @brief ユーザーオブジェクトに関する共通処理クラス
 *
 * @date 2017/07/26
 *
 * @author Masaki Suda
 */

class Date_util extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Tokyo');
	}

	/**
	 * 今月から1年前までの月を返却する
	 */
	public function get_month_prev_12()
	{
		$month_list = [];

		$month_list[] = date('Ym');

		// 今月から1年前までの月を格納する
		for ($i = 1; $i <= 12; $i++) {
			$month_list[] = date('Ym', strtotime(date('Ym').'-'.$i.' month'));
		}

		return $month_list;

	}

	/**
	 * 今月の日付リストを作成して返却する
	 */
	public function get_current_month_days($month, $days)
	{
		$current_days = [];

		for ($i = 1; $i <= $days; $i++) {
			if ($i < 10) {
				$current_days[] = $month. '/'. '0'. $i;
			} else {
				$current_days[] = $month. '/'. $i;				
			}
		}

		return $current_days;
	}

}


