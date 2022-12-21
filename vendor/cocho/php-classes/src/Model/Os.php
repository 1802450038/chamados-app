<?php

namespace cocho\Model;

use \cocho\Model;
use cocho\DB\Sql;

class Os extends Model
{

    // OK
    public static function listAll()
    {

        $sql = new Sql();
        $result = $sql->select("SELECT 
        o.os_id,
        o.user_technical_one_id,
        o.os_defect,
        o.os_status,
        o.os_dt_register,
        u.user_name,
        t1.user_name AS tec1,
        t2.user_name AS tec2,
        t3.user_name AS tec3,
        c.computer_patrimony
        FROM tb_os_computer o
        LEFT JOIN tb_user u ON u.user_id = o.user_id
        LEFT JOIN tb_user t1 ON t1.user_id = o.user_technical_one_id
        LEFT JOIN tb_user t2 ON t2.user_id = o.user_technical_two_id
        LEFT JOIN tb_user t3 ON t2.user_id = o.user_technical_three_id
        LEFT JOIN tb_computer c ON c.computer_id = o.computer_id
        ORDER BY o.os_dt_register DESC
        ");

        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    // 
    public static  function get($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT 
      o.*,
      u.user_name,
      t1.user_name AS tec1,
      t2.user_name AS tec2,
      t3.user_name AS tec3,
      c.computer_patrimony
      FROM tb_os_computer o
      LEFT JOIN tb_user u ON u.user_id = o.user_id
      LEFT JOIN tb_user t1 ON t1.user_id = o.user_technical_one_id
      LEFT JOIN tb_user t2 ON t2.user_id = o.user_technical_two_id
      LEFT JOIN tb_user t3 ON t2.user_id = o.user_technical_three_id
      LEFT JOIN tb_computer c ON c.computer_id = o.computer_id
      WHERE o.os_id = $id");

        if ($result) {
            return $result[0];
        } else {
            return 0;
        }
    }

    // 
    public static  function getByComputerId($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT 
        o.*,
        u.user_name,
        t1.user_name AS tec1,
        t2.user_name AS tec2,
        t3.user_name AS tec3,
        c.computer_patrimony
        FROM tb_os_computer o
        LEFT JOIN tb_user u ON u.user_id = o.user_id
        LEFT JOIN tb_user t1 ON t1.user_id = o.user_technical_one_id
        LEFT JOIN tb_user t2 ON t2.user_id = o.user_technical_two_id
        LEFT JOIN tb_user t3 ON t2.user_id = o.user_technical_three_id
        LEFT JOIN tb_computer c ON c.computer_id = o.computer_id
        WHERE o.computer_id = $id");

        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }


    public static  function getByUserId($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT
        SQL_CALC_FOUND_ROWS 
        o.*,
        u.user_name AS user,
        t1.user_name AS tec1,
        t2.user_name AS tec2,
        t3.user_name AS tec3,
        c.computer_patrimony
        FROM tb_os_computer o
        LEFT JOIN tb_user u ON u.user_id = o.user_id
        LEFT JOIN tb_user t1 ON t1.user_id = o.user_technical_one_id
        LEFT JOIN tb_user t2 ON t2.user_id = o.user_technical_two_id
        LEFT JOIN tb_user t3 ON t2.user_id = o.user_technical_three_id
        LEFT JOIN tb_computer c ON c.computer_id = o.computer_id
        WHERE o.user_technical_one_id = {$id}
        OR o.user_technical_two_id = {$id}
        OR o.user_technical_three_id = {$id}
        ORDER BY os_dt_register DESC
        LIMIT 15");
        
        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        

        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    // OK
    public function create()
    {
        $id_user = $_SESSION[User::SESSION]["user_id"];


        if (!$this->getcomputer_id()) {
            Message::throwMessage("Erro", "0", "Um computador deve ser selecionado");
        }

        if (!$this->getos_defect()) {
            Message::throwMessage("Erro", "0", "O defeito deve ser informado");
        }
        // if (!$this->getuser_technical_one_id() || $this->getuser_technical_one_id() == "0") {
        //     Message::throwMessage("Erro", "0", "O tecnico deve ser selecionado");
        // }
        if (!$this->getuser_technical_one_id()) {
            $this->setuser_technical_one_id("0");
        }
        if (!$this->getuser_technical_two_id()) {
            $this->setuser_technical_two_id("0");
        }
        if (!$this->getuser_technical_three_id()) {
            $this->setuser_technical_three_id("0");
        }
        if (!$this->getos_fix()) {
            $this->setos_fix("NÃO INFORMADO");
        }
        if (!$this->getos_note()) {
            $this->setos_note("NÃO INFORMADO");
        }
        if (!$this->getos_status()) {
            $this->setos_status("ABERTO");
        }

        $sql = new Sql();

        $sql->query(
            "INSERT INTO tb_os_computer(
                user_id,
                computer_id,
                user_technical_one_id,
                user_technical_two_id,
                user_technical_three_id,
                os_defect,
                os_fix,
                os_note,
                os_status
                ) VALUES(
                    '{$id_user}',
                    '{$this->getcomputer_id()}',
                    '{$this->getuser_technical_one_id()}',
                    '{$this->getuser_technical_two_id()}',
                    '{$this->getuser_technical_three_id()}',
                    '{$this->getos_defect()}',
                    '{$this->getos_fix()}',
                    '{$this->getos_note()}',
                    '{$this->getos_status()}'
                    )",
        );
        $result2 = $sql->select("SELECT os_id FROM tb_os_computer
            WHERE os_id = LAST_INSERT_ID()");
        Log::create("CREATE", "OS", json_encode(Os::get($result2[0]['os_id'])));
    }

    // 
    public function update()
    {
        $sql = new Sql();

        if (!$this->getos_defect() || $this->getos_defect() == "NÃO INFORMADO") {
            Message::throwMessage("Erro", "0", "O defeito deve ser informado");
        }

        if (!$this->getuser_technical_one_id() || $this->getuser_technical_one_id() == "0") {
            Message::throwMessage("Erro", "0", "O 1º Tecnico Responsavel deve ser informado");
        }

        $sql->query(
            "UPDATE tb_os_computer SET
            user_technical_one_id = '{$this->getuser_technical_one_id()}',
            user_technical_two_id = '{$this->getuser_technical_two_id()}',
            user_technical_three_id = '{$this->getuser_technical_three_id()}',
            os_defect = '{$this->getos_defect()}',
            os_fix = '{$this->getos_fix()}',
            os_note = '{$this->getos_note()}',
            os_status = '{$this->getos_status()}'
            WHERE os_id= '{$this->getos_id()}'"
        );

        Log::create("UPDATE", "OS", json_encode(Os::get($this->getos_id())));
    }
    // 
    public function updateStatus()
    {
        $sql = new Sql();

        if (!$this->getos_fix() || $this->getos_fix() == "NÃO INFORMADO") {
            Message::throwMessage("Erro", "0", "O reparo deve ser informado");
        }

        if (!$this->getuser_technical_two_id()) {
            $this->setuser_technical_two_id("0");
        }
        if (!$this->getuser_technical_three_id()) {
            $this->setuser_technical_three_id("0");
        }


        $sql->query(
            "UPDATE tb_os_computer SET
            user_technical_two_id = '{$this->getuser_technical_two_id()}',
            user_technical_three_id = '{$this->getuser_technical_three_id()}',
            os_fix = '{$this->getos_fix()}',
            os_note = '{$this->getos_note()}',
            os_status = '{$this->getos_status()}'
            WHERE os_id= '{$this->getos_id()}'"
        );

        Log::create("UPDATE STATUS", "OS", json_encode(Os::get($this->getos_id())));
    }



    // 
    public static function delete($id)
    {
        $sql = new Sql();

        Log::create("DELETE", "OS", json_encode(Os::get($id)));

        $sql->query("DELETE FROM tb_os_computer  WHERE os_id='{$id}'");
    }
}
