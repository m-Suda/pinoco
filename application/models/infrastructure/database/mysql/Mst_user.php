<?php

/**
 * MySQL用のデータベースアクセスクラス
 */
class Mst_user extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function select_all()
    {

        $this->db->select('
            user_id
          , user_name
          , user_auth
          , company_id
          , password
          , email
        ');
        // from
        $this->db->from('mst_user');
        // where
        $this->db->where('is_delete', Constants::IS_NOT_DELETED);

        $result = $this->db->get()->result_array();

        return count($result) !== 0 ? $result : [];

    }

    public function select_once($user_id)
    {

        $this->db->select('
            user_id
          , user_name
          , user_auth
          , company_id
          , password
          , email
        ');
        // from
        $this->db->from('mst_user');
        // where
        $this->db->where('user_id', $user_id);
        $this->db->where('is_delete', Constants::IS_NOT_DELETED);

        $result = $this->db->get()->result_array();

        return count($result) !== 0 ? $result[0] : [];

    }

    public function retrieve()
    {

    }

    public function insert()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

}