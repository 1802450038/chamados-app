<?php

namespace cocho\Model;

use \cocho\Model;
use cocho\DB\Sql;

class Delivery extends Model
{

    // OK
    public static function listAll()
    {

        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_delivery ORDER BY delivery_dt_register DESC");

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
            D.*,
            C.computer_patrimony,
            C.computer_sector,
            U.user_name
			FROM tb_delivery D
            LEFT JOIN tb_computer C ON C.computer_id = D.computer_id
            LEFT JOIN tb_user U ON U.user_id = D.user_id
			ORDER BY delivery_dt_register DESC
			LIMIT $start, $itemsPerPage;
		");

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

    public static function getPageSearch($sector, $addressee, $page = 1, $itemsPerPage = 20)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

        $results = "";

        if($sector && $addressee){
            $results = $sql->select("
            SELECT SQL_CALC_FOUND_ROWS 
            D.*,
            C.computer_patrimony,
            C.computer_id,
            C.computer_sector,
            U.user_name
            FROM tb_delivery D
            LEFT JOIN tb_computer C ON C.computer_id = D.computer_id
            LEFT JOIN tb_user U ON u.user_id = D.user_id
            WHERE 
            C.computer_sector LIKE '%$sector%' AND
            D.delivery_addressee LIKE '%$addressee%'
            ORDER BY delivery_dt_register DESC
            LIMIT $start, $itemsPerPage;
            ", );
        } elseif($sector){
            $results = $sql->select("
            SELECT SQL_CALC_FOUND_ROWS 
            D.*,
            C.computer_patrimony,
            C.computer_id,
            C.computer_sector,
            U.user_name
            FROM tb_delivery D
            LEFT JOIN tb_computer C ON C.computer_id = D.computer_id
            LEFT JOIN tb_user U ON u.user_id = D.user_id
            WHERE 
            C.computer_sector LIKE '%$sector%'
            ORDER BY delivery_dt_register DESC
            LIMIT $start, $itemsPerPage;
            ", );
        } elseif($addressee) {
            $results = $sql->select("
            SELECT SQL_CALC_FOUND_ROWS 
            D.*,
            C.computer_patrimony,
            C.computer_id,
            U.user_name
            FROM tb_delivery D
            LEFT JOIN tb_computer C ON C.computer_id = D.computer_id
            LEFT JOIN tb_user U ON u.user_id = D.user_id
            WHERE 
            D.delivery_addressee LIKE '%$addressee%'
            ORDER BY delivery_dt_register DESC
            LIMIT $start, $itemsPerPage;
            ", );
        }

		


		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

    // OK
    public function create()
    {
        $id_user = $_SESSION[User::SESSION]["user_id"];

        $sql = new Sql();

        $computer_id =0;

        if(!$this->getdelivery_addressee()){
            Message::throwMessage("Erro","0","O destinatario deve ser informado");
        }
        if(!$this->getcomputer_patrimony()){
            Message::throwMessage("Erro","0","O patrimonio deve ser informado");
        } else {
            $computer_id = Computer::getIdByPatrimony($this->getcomputer_patrimony());

            if($computer_id == 0){
                Message::throwMessage("Erro","0","Computador não encontrado");
            }
        }

        $res = $sql->query(
            "INSERT INTO tb_delivery(
                delivery_addressee,
                user_id,
                computer_id
                ) VALUES(
                    '{$this->getdelivery_addressee()}',
                    '{$id_user}',
                    '{$computer_id}'
                    )",
        );
        if ($res != '0') {
            Log::create("CREATE", "DELIVERY", json_encode(Delivery::get($res)));
            return "OK";
        } else {
            Message::throwMessage("Erro", "0", "Erro ao adicionar o entrega");
        }
    }

    public static  function get($id)
    {
        $sql = new Sql();
  
        $result = $sql->select(  "
        SELECT
        D.*,
        C.*,
        U.user_name
        FROM tb_delivery D
        LEFT JOIN tb_computer C ON C.computer_id = D.computer_id
        LEFT JOIN tb_user U ON U.user_id = D.user_id
        WHERE D.delivery_id = '$id'
		");

        if ($result) {
            return $result[0];
        } else {
            return 0;
        }
    }

   

   

    // 
    public static function delete($id)
    {
        $sql = new Sql();
        
        Log::create("DELETE","DELIVERY",json_encode(Delivery::get($id)));
        
        $sql->query("DELETE FROM tb_delivery  WHERE delivery_id='{$id}'");
    }
}
