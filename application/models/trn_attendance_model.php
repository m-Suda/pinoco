<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @file mst_user_model.php
 * @brief 勤怠のモデルクラス
 * 
 * 勤怠を扱うモデルクラス
 * 
 * @date 2018/07/21
 * 
 * @author Masaki Suda
 */

class Trn_attendance_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * 勤怠リスト取得SQL
	 */
	public function fetch_attendance_list($user_id, $month_beginning, $month_end)
	{
		$sql = <<<SQL
			SELECT
			    today
			  , arrival_time
			  , COALESCE(leave_time, '---') as leave_time
			  , day_report
			FROM
				trn_attendance
			WHERE
				user_id = ?
			AND
				today >= ?
			AND
				today <= ?
			AND
				is_delete = 0
			ORDER BY
				today ASC
SQL;

		$bind = [
			$user_id
		  , $month_beginning
		  , $month_end
		];

		$days = $this->db->query($sql, $bind)->result_array();

		return $days;
	}

    /**
     * 勤怠情報取得SQL
     */
	public function fetch_attendance($user_id, $date)
    {
        $sql = <<<SQL
			SELECT
				arrival_time
			  , COALESCE(leave_time, '---') as leave_time
			  , day_report
			FROM
				trn_attendance
			WHERE
				user_id = ?
			AND
				today = ?
			AND
				is_delete = 0;
SQL;

        $bind = [
            $user_id
          , $date
        ];

        $day = $this->db->query($sql, $bind)->result_array();

        return (!empty($day)) ? $day[0] : [];
    }

    /**
     * 勤怠詳細用登録SQL(管理画面用)
     */
    public function insert_attendance($post = null)
    {
        $create_user = $this->session->userdata['account_data']['user_name'];

        // postがあるときは管理者権限からINSERTされた
        if (isset($post)) {
            $this->db->set('user_id', $post['user_id'])
                     ->set('today', $post['date'])
                     ->set('arrival_time', $post['arrival_time'])
                     ->set('leave_time', $post['leave_time']);
        } else {
            // postがないとき、勤怠登録画面から出勤登録された
            $user_id = $this->session->userdata['account_data']['user_id'];

            $this->db->set('user_id', $user_id)
                     ->set('today', date('Ymd'))
                     ->set('arrival_time', date('H:i:s'))
                     ->set('leave_time', null);
        }

        // 作成者、時間、更新者、時間は共通
        $this->db->set('day_report', '')
                 ->set('create_user', $create_user)
                 ->set('create_date', date('YmdHis'))
                 ->set('update_user', $create_user)
                 ->set('update_date', date('YmdHis'));

        $bool = $this->db->insert('trn_attendance');

        return $bool;
    }

    /**
     * 勤怠詳細更新SQL(管理画面用)
     */
	public function update_attendance_for_admin($post)
    {
        $update_user = $this->session->userdata['account_data']['user_name'];

        $sql = <<<SQL
            UPDATE
                trn_attendance
            SET
                arrival_time = ?
              , leave_time = ?
              , update_user = ?
              , update_date = ?
            WHERE
                user_id = ?
            AND 
                today = ?
            AND
                is_delete = 0;
SQL;

        $bind = [
            $post['arrival_time']
          , $post['leave_time']
          , $update_user
          , date('YmdHis')
          , $post['user_id']
          , $post['date']
        ];

        $bool = $this->db->query($sql, $bind);

        return $bool;
    }

    /**
     * 退勤処理SQL
     */
    public function update_attendance($post)
    {
        $user_id = $this->session->userdata['account_data']['user_id'];
        $update_user = $this->session->userdata['account_data']['user_name'];

        $sql = <<<SQL
            UPDATE
                trn_attendance
            SET 
                leave_time = ?
              , day_report = ?
              , update_user = ?
              , update_date = ?
            WHERE
                user_id = ?
            AND
                today = ?
            AND
                is_delete = 0;
SQL;

        $bind = [
            date('H:i:s')
          , $post['day_report']
          , $update_user
          , date('YmdHis')
          , $user_id
          , date('Ymd')
        ];

        $this->db->query($sql, $bind);
    }

}