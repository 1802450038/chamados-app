<?php

namespace cocho\Model;

use cocho\DB\Postman;
use \cocho\Model;
use cocho\DB\Sql;

class User extends Model
{

    const SESSION = "User";
    const SECRET = "cavalinhopocoto";
    const SECRET_IV = "pedepano";
    const ERROR = "Error";
    const ERROR_REGISTER = "ErrorRegister";
    const SUCCESS = "Sucesss";


    public static function login($login, $password)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_user WHERE user_login ='$login'");

        if (count($results) === 0) {
            Message::throwMessage("Erro", "0", "Login ou senha invalidos");
        } else {

            $data = $results[0];

            if (password_verify($password, $data["user_password"]) === true) {
                $user = new User();
                $user->setData($data);
                $_SESSION[User::SESSION] = $user->getValues();
                return $user;
            } else {
                Message::throwMessage("Erro", "0", "Login ou senha invalidos");
            }
        }
    }

    public function updateUserSession($id)
    {
        if ((int)$id == (int)$_SESSION[User::SESSION]["user_id"]) {
            $_SESSION[User::SESSION] = $this->getValues();
        }
    }

    public static function verifyLogin()
    {

        if (
            !isset($_SESSION[User::SESSION])
            ||
            !$_SESSION[User::SESSION]
            ||
            !isset($_SESSION[User::SESSION]["token"])
        ) {
            header("Location:/login");
            exit;
        }
    }

    public static function logout()
    {
        $_SESSION[User::SESSION] = null;
    }

    // OK
    public static function listAll()
    {

        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_user");

        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }
    // OK
    public function create()
    {
        if ($this->getuser_password() == $this->getuser_verify_password()) {
            $this->setuser_password(User::getCriptoPassword($this->getuser_password()));
            $sql = new Sql();

            $sql->query(
                "INSERT INTO tb_user(
                user_name,
                user_email,
                user_login,
                user_password,
                user_type,
                user_is_admin
                ) VALUES(
                    '{$this->getuser_name()}',
                    '{$this->getuser_email()}',
                    '{$this->getuser_login()}',
                    '{$this->getuser_password()}',
                    '{$this->getuser_type()}',
                    '{$this->getuser_is_admin()}'
                    )",
            );
            $results2 = $sql->select("SELECT user_id FROM tb_user
            WHERE user_id = LAST_INSERT_ID()");
            if ($results2) {
                return $results2[0]['user_id'];
            } else {
                Message::throwMessage("Erro", "0", "Erro ao adicionar o usuario");
            }
        } else {
            Message::throwMessage("Erro", "0", "As senhas não conferem");
        }
    }

    // OK
    public function update()
    {
        $sql = new Sql();

        $sql->query("UPDATE tb_user SET 
        user_name='{$this->getuser_name()}',
        user_email='{$this->getuser_email()}',
        user_login='{$this->getuser_login()}',
        user_type='{$this->getuser_type()}',
        user_is_admin='{$this->getuser_is_admin()}'
        WHERE user_id='{$this->getuser_id()}'");
    }


    // OK
    public static  function get($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_user WHERE user_id = '$id'");

        if ($result) {
            return $result[0];
        } else {
            return 0;
        }
    }

    // OK
    public static  function getUserName($id)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT user_name FROM tb_user WHERE user_id = '$id'");

        if ($result) {
            return $result[0]["user_name"];
        } else {
            return 0;
        }
    }

    // OK
    public static function delete($id)
    {
        $sql = new Sql();

        $sql->query("DELETE FROM tb_user  WHERE user_id='{$id}'");
    }

    public static function getCriptoPassword($password)
    {
        $cripto = password_hash($password, PASSWORD_DEFAULT, [
            "cost" => 12
        ]);

        return $cripto;
    }
}
