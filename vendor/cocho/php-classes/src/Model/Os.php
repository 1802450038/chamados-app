<?php

namespace cocho\Model;

use cocho\DB\Postman;
use \cocho\Model;
use cocho\DB\Sql;
use Error;

class Os extends Model
{

    // OK
    public static function listAll()
    {

        $sql = new Sql();
        $result = $sql->select("SELECT 
        o.os_id,
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

    // OK
    public function create()
    {
        $id_user = $_SESSION[User::SESSION]["user_id"];

        if(!$this->getuser_technical_one_id()){
            Message::throwMessage("Erro","0","Um tecnico deve ser selecionado");
        }
        if(!$this->getcomputer_id()){
            Message::throwMessage("Erro","0","Um computador deve ser selecionado");
        }

        if(!$this->getuser_technical_two_id()){
            $this->setuser_technical_two_id("0");
        }
        if(!$this->getuser_technical_three_id()){
            $this->setuser_technical_three_id("0");
        }
        if(!$this->getos_defect()){
            $this->setos_defect("NÃO INFORMADO");
        }
        if(!$this->getos_defect()){
            $this->setos_defect("NÃO INFORMADO");
        }
        if(!$this->getos_fix()){
            $this->setos_fix("NÃO INFORMADO");
        }
        if(!$this->getos_note()){
            $this->setos_note("NÃO INFORMADO");
        }
        if(!$this->getos_status()){
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
            computer_soc = '{$this->getcomputer_soc()}',
            computer_mem = '{$this->getcomputer_mem()}',
            computer_video_card = '{$this->getcomputer_video_card()}',
            computer_network_card = '{$this->getcomputer_network_card()}',
            computer_hd = '{$this->getcomputer_hd()}',
            computer_hd_type = '{$this->getcomputer_hd_type()}',
            computer_state = '{$this->getcomputer_state()}',
            computer_note = '{$this->getcomputer_note()}'
            WHERE computer_id= '{$this->getcomputer_id()}'");   
    }
    // 
    public function updateStatus()
    {
        $sql = new Sql();

        $sql->query(
            "UPDATE tb_os_computer SET
            user_technical_one_id = '{$this->getuser_technical_one_id()}',
            user_technical_two_id = '{$this->getuser_technical_two_id()}',
            user_technical_three_id = '{$this->getuser_technical_three_id()}',
            os_defect = '{$this->getos_defect()}',
            os_fix = '{$this->getos_fix()}',
            os_note = '{$this->getos_note()}',
            os_status = '{$this->getos_status()}'
            WHERE os_id= '{$this->getos_id()}'");   
    }

  

    // 
    public static function delete($id)
    {
        $sql = new Sql();

        $sql->query("DELETE FROM tb_computer  WHERE computer_id='{$id}'");
    }

}