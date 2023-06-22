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

    // OK
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

    // OK 
    public function updateUserSession($id)
    {
        if ((int)$id == (int)$_SESSION[User::SESSION]["user_id"]) {
            $_SESSION[User::SESSION] = $this->getValues();
        }
    }

    // OK
    public static function verifyLogin()
    {
        
        if (
            !isset($_SESSION[User::SESSION])
            ||
            !isset($_SESSION[User::SESSION]["user_id"])
            ||
            !$_SESSION[User::SESSION]["user_id"]
        ) {
            User::logout();
            header("Location:/login");
            exit;
        }
    }

    // OK
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
    public static function listForTemplate()
    {

        $sql = new Sql();
        $result = $sql->select("SELECT user_id, user_name FROM tb_user");

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

            $res = $sql->query(
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
            if ($res != '0') {
                Log::create("CREATE", "USER", json_encode(User::get($res)));
                return $res;
            } else {
                Message::throwMessage("Erro", "0", "Erro ao adicionar o usuario");
            }
        } else {
            Message::throwMessage("Erro", "0", "As senhas não conferem");
        }
    }

    // OK
    public function updateUserPassword()
    {
        if (strlen($this->getuser_password()) >= 8) {

            if ($this->getuser_password() == $this->getuser_verify_password()) {
                $this->setuser_password(User::getCriptoPassword($this->getuser_password()));
                $sql = new Sql();
                $sql->query("UPDATE tb_user SET 
                user_password='{$this->getuser_password()}'
                WHERE user_id='{$this->getuser_id()}'");
                Log::create("UPDATE PASSWORD", "USER", json_encode(User::get($this->getuser_id())));
            } else {
                Message::throwMessage("Erro", "0", "As senhas devem ser iguais");
            }
        } else {
            Message::throwMessage("Erro", "0", "A senha deve possuir no minimo 8 caracteres");
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
        user_is_admin='{$this->getuser_is_admin()}',
        user_profile_picture='{$this->getuser_profile_picture()}'
        WHERE user_id='{$this->getuser_id()}'");
        Log::create("UPDATE", "USER", json_encode($this->getValues()));
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
    public static  function getByEmail($email)
    {
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_user WHERE user_email = '$email'");

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

        Log::create("DELETE", "USER", json_encode(User::get($id)));
        $sql->query("DELETE FROM tb_user  WHERE user_id='{$id}'");
    }

    // OK
    public static function getCriptoPassword($password)
    {
        $cripto = password_hash($password, PASSWORD_DEFAULT, [
            "cost" => 12
        ]);

        return $cripto;
        // ../../res/_assets/_defaultimg/user.jpg
    }

    // OK
    public static function sendRecoveryEmail()
    {
    }

    public function checkphoto()
    {
        if (file_exists(
            $_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .
            "res" . DIRECTORY_SEPARATOR .
            "_assets" . DIRECTORY_SEPARATOR .
            "_userimg" . DIRECTORY_SEPARATOR .
            $this->getuser_id() . $this->getuser_login() . ".jpg"
        )) {
            $url = "/res/_assets/_userimg/"  .  $this->getuser_id() . $this->getuser_login() . ".jpg";
        } else {
            $url = "/res/_assets/_defaultimg/user.jpg";
        }
        $this->setuser_profile_picture($url);
        return $url;
    }

    public function setPhoto($photo)
    {

        $extension = explode('.', $photo['fileUpload']['name']);
        $extension = end($extension);

        switch ($extension) {

            case "jpg":
            case "jpeg":
                $image = imagecreatefromjpeg($photo['fileUpload']["tmp_name"]);
                break;

            case "gif":
                $image = imagecreatefromgif($photo['fileUpload']["tmp_name"]);
                break;

            case "png":
                $image = imagecreatefrompng($photo['fileUpload']["tmp_name"]);
                break;
        }

        $dist =  $_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .
        "res" . DIRECTORY_SEPARATOR .
        "_assets" . DIRECTORY_SEPARATOR .
        "_userimg" . DIRECTORY_SEPARATOR .
        $this->getuser_id() . $this->getuser_login() .
         ".jpg";

        imagejpeg($image, $dist);

        imagedestroy($image);

        $this->checkphoto();
    }
}
