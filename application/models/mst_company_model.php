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

class Mst_company_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * 法人取得SQL
	 */
	public function fetch_company_list($company_id = null)
	{
		$this->db->select('company_id
						 , company_name
						 , company_name_kana
						 , tel
						 , mail_address
						 , zip
						 , address')
				  ->from('mst_company');
		if (isset($company_id)) {
			$this->db->where('company_id', $company_id);
		}
		$this->db->where('is_delete', 0);
		$this->db->order_by('company_id', 'ASC');

		$company_list = $this->db->get()->result_array();

		return $company_list;
	}

    /**
     * 法人作成SQL
     */
	public function insert_company($post)
    {
        $create_user = $this->session->userdata['account_data']['user_name'];
        $create_date = date('YmdHis');

        $post['create_user'] = $create_user;
        $post['create_date'] = $create_date;
        $post['update_user'] = $create_user;
        $post['update_date'] = $create_date;

        $bool = $this->db->insert('mst_company', $post);

        return $bool;
    }

    /**
     * 法人更新SQL
     */
    public function update_company($post)
    {
        $update_user = $this->session->userdata['account_data']['user_name'];
        $update_date = date('YmdHis');

        $post['update_user'] = $update_user;
        $post['update_date'] = $update_date;

        $this->db->where('company_id', $post['company_id']);
        $bool = $this->db->update('mst_company', $post);

        return $bool;
    }

	/**
	 * 法人削除SQL
	 */
	public function delete_company($company_id)
	{
		$this->db->set('is_delete', 1);
		$this->db->where('company_id', $company_id);
		$this->db->update('mst_company');
	}
	
}