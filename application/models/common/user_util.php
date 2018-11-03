<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @file user_util.php
 * @brief ユーザーオブジェクトに関する共通処理クラス
 *
 * @date 2017/07/26
 *
 * @author Masaki Suda
 */

class User_util extends CI_Model
{

	function __construct()
	{
		parent::__construct();

	}

	/**
	 * user_typeを種別名に振り分けてからリストを変換する
	 */
	public function user_type_dispatching($user_list)
	{

		// user_typeを種別名に変換する
		foreach ($user_list as &$user) {
			$user_type = $user['user_type'];
			$user['user_type_name'] = $this->get_user_type_name($user_type);
		}
		// 間違って変更されないよう、明示的に解除
		unset($user);

		return $user_list;

	}


	/**
	 * user_typeから対象となる種別名を返却する
	 * @param $user_type
	 * @return string
	 */
	private function get_user_type_name($user_type) {
		
		$user_type_list = $this->constants->user_type_list();

		foreach ($user_type_list as $type => $user_type_name) {
			if ($user_type === (String)$type) {
				return $user_type_name;
			}
		}

		return "";
	}
}


