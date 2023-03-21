<?php

namespace cocho\Model;

use cocho\DB\Postman;
use \cocho\Model;
use cocho\DB\Sql;

class Computer extends Model
{

    // OK
    public static function listAll()
    {

        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_computer WHERE is_active = '1' ORDER BY computer_dt_register DESC");

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
			SELECT SQL_CALC_FOUND_ROWS *
			FROM tb_computer
            WHERE is_active = '1' 
			ORDER BY computer_dt_register DESC
			LIMIT $start, $itemsPerPage;
		");

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            'data' => $results,
            'total' => (int)$resultTotal[0]["nrtotal"],
            'pages' => ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        ];
    }

    public static function getPageSearch($patrimony, $sector, $page = 1, $itemsPerPage = 20)
    {

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();

        if ($patrimony && $sector) {
            $results = $sql->select("
                    SELECT SQL_CALC_FOUND_ROWS *
                    FROM tb_computer
                    WHERE computer_patrimony LIKE '%$patrimony%' AND
                    computer_sector LIKE '%$sector%'
                    ORDER BY computer_dt_register DESC
                    LIMIT $start, $itemsPerPage;
                ",);
        } elseif ($patrimony) {
                $results = $sql->select("
                SELECT SQL_CALC_FOUND_ROWS *
                FROM tb_computer
                WHERE computer_patrimony LIKE '%$patrimony%' 
                ORDER BY computer_dt_register DESC
                LIMIT $start, $itemsPerPage;
            ",);
        } elseif ($sector) {
                $results = $sql->select("
                SELECT SQL_CALC_FOUND_ROWS *
                FROM tb_computer
                WHERE computer_sector LIKE '%$sector%'
                ORDER BY computer_dt_register DESC
                LIMIT $start, $itemsPerPage;
            ",);
        }

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            'data' => $results,
            'total' => (int)$resultTotal[0]["nrtotal"],
            'pages' => ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        ];
    }

    // OK
    public function create()
    {
        $id_user = $_SESSION[User::SESSION]["user_id"];

        $sql = new Sql();

        if (!$this->getcomputer_sector()) {
            Message::throwMessage("Erro", "0", "O setor deve ser informado");
        }
        if (!$this->getcomputer_patrimony()) {
            Message::throwMessage("Erro", "0", "O patrimonio deve ser informado");
        }
        if (!$this->getcomputer_issue()) {
            $this->setcomputer_issue("Não informado");
        }

        if (!$this->getcomputer_ip()) {
            $this->setcomputer_ip("Não informado");
        }

        if (!$this->getcomputer_user_name()) {
            $this->setcomputer_user_name("Não informado");
        }

        if (!$this->getcomputer_user_registration()) {
            $this->setcomputer_user_registration("Não informado");
        }

        if (!$this->getcomputer_brand()) {
            $this->setcomputer_brand("Não informado");
        }

        if (!$this->getcomputer_soc()) {
            $this->setcomputer_soc("Não informado");
        }

        if (!$this->getcomputer_mem()) {
            $this->setcomputer_mem("Não informado");
        }

        if (!$this->getcomputer_video_card()) {
            $this->setcomputer_video_card("Não informado");
        }

        if (!$this->getcomputer_network_card()) {
            $this->setcomputer_network_card("Não informado");
        }

        if (!$this->getcomputer_hd()) {
            $this->setcomputer_hd("Não informado");
        }

        if (!$this->getcomputer_hd_type()) {
            $this->setcomputer_hd_type("Não informado");
        }

        if (!$this->getcomputer_note()) {
            $this->setcomputer_note("Não informado");
        }

        if (!$this->getcomputer_state()) {
            $this->setcomputer_state("EM ANALISE");
        }


        $res = $sql->query(
            "INSERT INTO tb_computer(
                user_register_id,
                computer_sector,
                computer_patrimony,
                computer_ip,
                computer_user_name,
                computer_user_registration,
                computer_brand,
                computer_soc,
                computer_mem,
                computer_video_card,
                computer_network_card,
                computer_hd,
                computer_hd_type,
                computer_state,
                computer_issue,
                computer_note
                ) VALUES(
                    '{$id_user}',
                    '{$this->getcomputer_sector()}',
                    '{$this->getcomputer_patrimony()}',
                    '{$this->getcomputer_ip()}',
                    '{$this->getcomputer_user_name()}',
                    '{$this->getcomputer_user_registration()}',
                    '{$this->getcomputer_brand()}',
                    '{$this->getcomputer_soc()}',
                    '{$this->getcomputer_mem()}',
                    '{$this->getcomputer_video_card()}',
                    '{$this->getcomputer_network_card()}',
                    '{$this->getcomputer_hd()}',
                    '{$this->getcomputer_hd_type()}',
                    '{$this->getcomputer_state()}',
                    '{$this->getcomputer_issue()}',
                    '{$this->getcomputer_note()}'
                    )",
        );
        if ($res != '0') {
            Log::create("CREATE", "COMPUTER", json_encode(Computer::get($res)));
            return "OK";
        } else {
            Message::throwMessage("Erro", "0", "Erro ao adicionar o computador");
        }
    }

    // 
    public function update()
    {
        $sql = new Sql();

        $sql->query(
            "UPDATE tb_computer SET
            computer_sector = '{$this->getcomputer_sector()}',
            computer_patrimony = '{$this->getcomputer_patrimony()}',
            computer_ip = '{$this->getcomputer_ip()}',
            computer_user_name = '{$this->getcomputer_user_name()}',
            computer_user_registration = '{$this->getcomputer_user_registration()}',
            computer_brand = '{$this->getcomputer_brand()}',
            computer_soc = '{$this->getcomputer_soc()}',
            computer_mem = '{$this->getcomputer_mem()}',
            computer_video_card = '{$this->getcomputer_video_card()}',
            computer_network_card = '{$this->getcomputer_network_card()}',
            computer_hd = '{$this->getcomputer_hd()}',
            computer_hd_type = '{$this->getcomputer_hd_type()}',
            computer_state = '{$this->getcomputer_state()}',
            computer_note = '{$this->getcomputer_note()}'
            WHERE computer_id= '{$this->getcomputer_id()}'"
        );
        Log::create("UPDATE", "COMPUTER", json_encode(Computer::get($this->getcomputer_id())));
    }

    // 
    public static  function get($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_computer WHERE computer_id = '$id'");

        if ($result) {
            return $result[0];
        } else {
            return 0;
        }
    }

    public static  function getPatrimony($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT computer_patrimony FROM tb_computer WHERE computer_id = '$id'");

        if ($result) {
            return $result[0]['computer_patrimony'];
        } else {
            return 0;
        }
    }

    public static  function getIdByPatrimony($patrimony)
    {
        $sql = new Sql();
        $result = $sql->select("
        SELECT computer_id FROM 
        tb_computer 
        WHERE computer_patrimony = '$patrimony'");


        if ($result) {
            return $result[0]['computer_id'];
        } else {
            return 0;
        }
    }

    // 
    public static function delete($id)
    {
        $sql = new Sql();

        Log::create("DELETE", "COMPUTER", json_encode(Computer::get($id)));

        $sql->query("DELETE FROM tb_computer  WHERE computer_id='{$id}'");
    }
}
