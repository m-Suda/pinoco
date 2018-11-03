<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @file mst_user_model.php
 * @brief ユーザーマスタのモデルクラス
 * 
 * ユーザーマスタを扱うモデルクラス
 * 
 * @date 2018/07/21
 * 
 * @author Masaki Suda
 */

class Mst_user_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * ログイン時SQL
	 * @param $post
	 * @return array
	 */
	public function login($post)
	{

	    $sql = <<<SQL
	        SELECT
				user_id
    	      , user_name
        	  , user_type
			  , company_id
        	FROM
				mst_user
			WHERE
            	user_id = ?
        	AND
            	password = ?
        	AND
            	is_delete = 0
SQL;

		$bind = [
    	      $post['login_id']
			, $post['passwd']
		];

	    $account_data = $this->db->query($sql, $bind)->row_array();

    	return $account_data;
	}

	/**
	 * ユーザーリスト取得SQL
	 */
	public function fetch_users($user_id = null)
	{
		$this->db->select('user_id
						 , user_name
						 , user_type
						 , mst_user.company_id
						 , company_name
						 , mst_user.mail_address
						 , start_date
						 , end_date')
				  ->from('mst_user')
				  ->join('mst_company'
					  , 'mst_user.company_id = mst_company.company_id
					  	 AND mst_company.is_delete = 0'
					  , 'left');
		if (isset($user_id)) {
			$this->db->where('user_id', $user_id);
		}
		$this->db->where('mst_user.is_delete', 0);
		$this->db->order_by('mst_user.create_date', 'ASC');

		$users = $this->db->get()->result_array();

		return $users;
	}

	/**
     * ユーザー登録処理SQL
     */
	public function insert_user($post)
    {

	    $create_user = $this->session->userdata['account_data']['user_name'];
	    $create_date = date('YmdHis');

	    // 確認用パスワードを削除
	    unset($post['confirm_password']);

	    $post['create_user'] = $create_user;
	    $post['create_date'] = $create_date;
	    $post['update_user'] = $create_user;
	    $post['update_date'] = $create_date;

	    $bool = $this->db->insert('mst_user', $post);

        return $bool;
    }

    /**
     * ユーザー更新処理SQL
     */
    public function update_user($post)
    {
        $update_user = $this->session->userdata['account_data']['user_name'];
        $update_date = date('YmdHis');

        $this->db->set('user_name', $post['user_name'])
                 ->set('user_type', $post['user_type'])
                 ->set('company_id', $post['company_id'])
                 ->set('mail_address', $post['mail_address'])
                 ->set('start_date', $post['start_date'])
                 ->set('end_date', $post['end_date'])
                 ->set('update_user', $update_user)
                 ->set('update_date', $update_date);

        if ($post['password']) {
            $this->db->set('password', $post['password']);
        }

        $this->db->where('user_id', $post['user_id']);
        $bool =  $this->db->update('mst_user');

        return $bool;

    }

	/**
	 * ユーザー削除処理SQL
	 */
	public function delete_user($user_id)
	{
		$this->db->set('is_delete', 1);
		$this->db->where('user_id', $user_id);
		$this->db->update('mst_user');
	}
	
}