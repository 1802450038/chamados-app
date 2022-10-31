<?php

namespace cocho\Model;

use \cocho\Model;
use cocho\DB\Sql;

class Log extends Model
{

    // OK
    public static function listAll()
    {
        $sql = new Sql();
        $result = $sql->select("SELECT 
        l.*,
        u.user_name 
        FROM tb_log l
        LEFT JOIN tb_user u ON u.user_id = l.user_id
        ORDER BY log_dt_register DESC");

        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }



    public static function getPage($page = 1, $itemsPerPage = 20)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS
            l.*,
            u.user_name
			FROM tb_log l
            LEFT JOIN tb_user u ON u.user_id = l.user_id
			ORDER BY log_dt_register DESC
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

    public static function getPageSearch($search, $page = 1, $itemsPerPage = 20)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
            SELECT SQL_CALC_FOUND_ROWS
            l.*,
            u.user_name
            FROM tb_log l
            LEFT JOIN tb_user u ON u.user_id = l.user_id
			WHERE u.user_name LIKE :search
			ORDER BY log_dt_register DESC
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}



    // OK
    public static function create($operation,$entity,$value)
    {
        $id_user = $_SESSION[User::SESSION]["user_id"];

        $sql = new Sql();

        $sql->query(
            "INSERT INTO tb_log(
                user_id,
                log_entity,
                log_operation,
                log_info                
                ) VALUES(
                    '{$id_user}',
                    '{$entity}',
                    '{$operation}',
                    '{$value}'
                    )",
                );
    }

     public static function get($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT 
        l.*,
        u.user_name AS user
        FROM tb_log l
        LEFT JOIN tb_user u ON u.user_id = l.user_id
        WHERE log_id = {$id}");

        if ($result) {
            return $result[0];
        } else {
            return 0;
        }
    }

}
