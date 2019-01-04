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

        $sql = <<<SQL
            SELECT
                user.user_id
              , user.user_name
              , user.user_auth
              , user.company_id
              , company.company_name
              , password
              , user.email
            FROM
                mst_user user
            LEFT JOIN
                mst_company company
                ON 
                    user.company_id = company.company_id
            WHERE
                user.is_delete = ?                   
SQL;

        $bind = [
            Database_constants::IS_NOT_DELETED
        ];

        $result = $this->db->query($sql, $bind)->result_array();

        return count($result) !== 0 ? $result : [];

    }

    public function select_once($user_id)
    {

        $sql = <<<SQL
            SELECT
                user.user_id
              , user.user_name
              , user.user_auth
              , user.company_id
              , company.company_name
              , password
              , user.email
            FROM
                mst_user user
            LEFT JOIN
                mst_company company
                ON 
                    user.company_id = company.company_id
            WHERE
                user.user_id = ?
            AND
                user.is_delete = ?                   
SQL;

        $bind = [
            $user_id
          , Database_constants::IS_NOT_DELETED
        ];

        $result = $this->db->query($sql, $bind)->result_array();

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