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
        $result = $sql->select("SELECT * FROM tb_computer");

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

            $sql = new Sql();

            $sql->query(
                "INSERT INTO tb_computer(
                user_register_id,
                computer_sector,
                computer_patrimony,
                computer_ip,
                computer_user_name,
                computer_user_registration,
                computer_soc,
                computer_mem,
                computer_video_card,
                computer_network_card,
                computer_hd,
                computer_hd_type,
                computer_state,
                computer_note
                ) VALUES(
                    '{$id_user}',
                    '{$this->getcomputer_sector()}',
                    '{$this->getcomputer_patrimony()}',
                    '{$this->getcomputer_ip()}',
                    '{$this->getcomputer_user_name()}',
                    '{$this->getcomputer_user_registration()}',
                    '{$this->getcomputer_soc()}',
                    '{$this->getcomputer_mem()}',
                    '{$this->getcomputer_video_card()}',
                    '{$this->getcomputer_network_card()}',
                    '{$this->getcomputer_hd()}',
                    '{$this->getcomputer_hd_type()}',
                    'EM AVALIAÇÃO',
                    '{$this->getcomputer_note()}'
                    )",
            );      
    }

    // 
    public function update()
    {
        $sql = new Sql();

        var_dump($this);

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
            computer_state = 'EM AVALIAÇÃO',
            computer_note = '{$this->getcomputer_note()}'
            WHERE computer_id= '{$this->getcomputer_id()}'");   
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

    // 
    public static function delete($id)
    {
        $sql = new Sql();

        $sql->query("DELETE FROM tb_user  WHERE user_id='{$id}'");
    }

}
