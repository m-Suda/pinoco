<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * @file d_company.php
 * @brief 法人機能のコンポーネントクラス
 *
 * 法人機能サービスから呼び出される業務ロジッククラス。<br>
 *
 *
 * @author	Boncre
 */

class D_company extends CI_Model {

	function __construct() {
		parent::__construct();

	}

	/**
	 * 法人情報の取得
	 * @param $company_id
	 * @return array
	 */
	public function company_info($company_id=null) {

		$sql = "SELECT
					company_id,
					company_name,
					company_name_kana,
					charge_name,
					charge_name_kana,
					tel,
					mail_1,
					mail_2,
					zip,
					address,
					memo,
					regist_user,
					TO_CHAR(regist_date, 'YYYY-MM-DD HH24:MI') AS regist_date,
					update_user,
					TO_CHAR(update_date, 'YYYY-MM-DD HH24:MI') AS update_date,
					del_flg
		        FROM
		        	M_COMPANY
		        WHERE
		            del_flg = '0'
				";

		///全情報取得
		if($company_id == null){
			$company_list = $this->db->query($sql)->result_array();
			return $company_list;

		///指定した法人のみ検索
		} else {
			$sql.="AND
					company_id = ?
					";
			$params = array($company_id);
			$company_list = $this->db->query($sql, $params)->result_array();
			return $company_list;
		}

	}

}