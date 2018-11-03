<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class D_attendance extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	
	public function get_attendance($attend_data) {
		
		$sql = "SELECT
							USER_ID,
							TODAY,
							ARRIVAL_TIME,
							LEAVE_TIME
					FROM
							T_ATTEND_LOG
					WHERE
							USER_ID = ?
					AND
							TODAY = ?
					AND
							IS_DELETE = '0'";
		
		$attend_check = $this->db->query($sql,
				array($attend_data['userId'],
						$attend_data['today']))->row_array();
		
		return  $attend_check;
	
	}
	
	public function arrival($attend_data) {
		$create_user = $this->session->userdata['account_data'];
		$update_username = $create_user['user_name'];
		$update_user_id = $attend_data['userId'];
		$today = $attend_data['today'];
		
	$sql = "UPDATE
					T_ATTEND_LOG
				SET
					ARRIVAL_TIME = NOW(),
					UPDATE_USER = ?,
					UPDATE_DATE =NOW()
				WHERE
					USER_ID = ?
				AND
					TODAY = ?
				";
	
	$this->db->query($sql,
			array(
					$update_username,
					$update_user_id,
					$today
			));
	}

	public function leaving($attend_data) {
		$create_user = $this->session->userdata['account_data'];
		$update_username = $create_user['user_name'];
		$update_user_id = $attend_data['userId'];
		$today = $attend_data['today'];
		
		$sql = "UPDATE
					T_ATTEND_LOG
				SET
					LEAVE_TIME = NOW(),
					UPDATE_USER = ?,
					UPDATE_DATE =NOW()
				WHERE
					USER_ID = ?
				AND
					TODAY = ?
				";
		
		$this->db->query($sql,
				array(
						$update_username,
						$update_user_id,
						$today
				));
	}
	
	public  function create_attend_record($attend_data) {
		
		$create_user = $this->session->userdata['account_data'];
		$create_username = $create_user['user_name'];
		$create_user_id = $attend_data['userId'];
		$today = $attend_data['today'];
		
		$sql = "INSERT INTO
				t_attend_log(
									user_id,
									today,
									regist_user,
									regist_date,
									update_user,
									update_date
									)
					VALUES (
									?,
									?,
									?,
									NOW(),
									?,
									NOW()
								)";
		
		$this->db->query($sql,
					array(
						$create_user_id,
						$today,
						$create_username,
						$create_username
				));

	}
}