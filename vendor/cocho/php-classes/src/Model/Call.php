<?php

namespace cocho\Model;

use cocho\DB\Postman;
use \cocho\Model;
use cocho\DB\Sql;

class Call extends Model
{

    // OK
    public static function listAll()
    {
        $sql = new Sql();
        $result = $sql->select("SELECT 
        c.*,
        u.user_name
        FROM tb_call c
        LEFT JOIN tb_user u ON u.user_id = c.user_one_id
        ORDER BY call_dt_register DESC");

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

      
        if(!$this->getcall_issue()){
            Message::throwMessage("Erro","0","O problema deve ser informado");
        }
        if(!$this->getcall_sector()){
            Message::throwMessage("Erro","0","O setor deve ser informado");
        }

        if(!$this->getcall_departament()){
            $this->setcall_departament("Não informado");
        }
        if(!$this->getcall_caller()){
            $this->setcall_caller("Não informado");
        }

        $sql->query(
            "INSERT INTO tb_call(
                user_id,
                user_one_id,
                user_two_id,
                user_three_id,
                call_issue,
                call_sector,
                call_departament,
                call_caller                
                ) VALUES(
                    '{$id_user}',
                    '{$this->getuser_one_id()}',
                    '{$this->getuser_two_id()}',
                    '{$this->getuser_three_id()}',
                    '{$this->getcall_issue()}',
                    '{$this->getcall_sector()}',
                    '{$this->getcall_departament()}',
                    '{$this->getcall_caller()}'
                    )",
        );
        $result2 = $sql->select("SELECT user_id FROM tb_user
        WHERE user_id = LAST_INSERT_ID()");
        Log::create("CREATE","USER",User::get($result2[0]['user_id']));
    }

    // 
    public static function finish($id_call)
    {
        $sql = new Sql();

        $sql->query(
            "UPDATE tb_call SET
            call_status = 'CONCLUIDO'
          WHERE call_id= '{$id_call}'"
        );
    }
    // 
    public static function subscribe($id_call, $id_user)
    {
        $sql = new Sql();

        $sql->query(
            "UPDATE tb_call SET
            user_one_id = '{$id_user}'
          WHERE call_id= '{$id_call}'"
        );
    }
    // 
    public static function unsubscribe($id_call)
    {
        $sql = new Sql();

        $sql->query(
            "UPDATE tb_call SET
            user_one_id = '0'
          WHERE call_id= '{$id_call}'"
        );
    }

    // 
    public function update()
    {
        $sql = new Sql();

        $sql->query(
            "UPDATE tb_call SET
            user_two_id = '{$this->getuser_two_id()}',
            user_three_id = '{$this->getuser_three_id()}',
            call_issue = '{$this->getcall_issue()}',
            call_sector = '{$this->getcall_sector()}',
            call_departament = '{$this->getcall_departament()}',
            call_caller = '{$this->getcall_caller()}'
            WHERE call_id= '{$this->getcall_id()}'"
        );
    }

     public static function get($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT 
        c.*,
        u.user_name AS user,
        t1.user_name AS tec1,
        t2.user_name AS tec2,
        t3.user_name AS tec3
        FROM tb_call c
        LEFT JOIN tb_user u ON u.user_id = c.user_id
        LEFT JOIN tb_user t1 ON t1.user_id = c.user_one_id
        LEFT JOIN tb_user t2 ON t2.user_id = c.user_two_id
        LEFT JOIN tb_user t3 ON t3.user_id = c.user_three_id
        WHERE call_id = {$id}
        ORDER BY call_dt_register DESC");

        if ($result) {
            return $result[0];
        } else {
            return 0;
        }
    }


    public static function getByUserId($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT 
        c.*,
        u.user_name AS user,
        t1.user_name AS tec1,
        t2.user_name AS tec2,
        t3.user_name AS tec3
        FROM tb_call c
        LEFT JOIN tb_user u ON u.user_id = c.user_id
        LEFT JOIN tb_user t1 ON t1.user_id = c.user_one_id
        LEFT JOIN tb_user t2 ON t2.user_id = c.user_two_id
        LEFT JOIN tb_user t3 ON t3.user_id = c.user_three_id
        WHERE c.user_one_id = {$id} 
        OR c.user_two_id = {$id} 
        OR c.user_three_id = {$id}
        ORDER BY call_dt_register DESC");

        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    // 
    public static function delete($id)
    {
        $sql = new Sql();

        Log::create("DELETE", "CALL", json_encode(Call::get($id)));

        $sql->query("DELETE FROM tb_call  WHERE call_id='{$id}'");
    }
}
