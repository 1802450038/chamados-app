<?php

namespace cocho\Model;

use cocho\DB\Postman;
use \cocho\Model;

class User extends Model
{

    const SESSION = "User";
    const SECRET = "cavalinhopocoto";
    const SECRET_IV = "pedepano";
    const ERROR = "Error";
    const ERROR_REGISTER = "ErrorRegister";
    const SUCCESS = "Sucesss";


    public static function login($login, $password){

        $response = Postman::postPostmanLogin($login, $password);

        if (isset($response["detail"])) {
            if ($response["detail"] == "Email or password incorrect") {
                Message::throwMessage("Erro","0", "Login ou senha invalidos");
            }
        } else if(isset($response)){
            $_SESSION[User::SESSION] = $response["user"];
            $_SESSION[User::SESSION]["token"] = $response["token"];
        } else {
            Message::throwMessage("Erro", "0", "Falha na conexão");
        }
    }

    public function updateUserSession($id){
        if ((int)$id == (int)$_SESSION[User::SESSION]["user_id"]) {
            $_SESSION[User::SESSION] = $this->getValues();
        }
    }

    public static function verifyLogin(){

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

    public static function logout(){
        $_SESSION[User::SESSION] = null;
    }

   
    public static function listAll(){
        $postman = new Postman();

        $key = $_SESSION[User::SESSION]["token"];

        $response = $postman->getPostmanAll("users", $key);


        if (isset($response[0]["id"])) {
            $response;
        } else {
            $response = "";
        }

        return $response;
    }

    public static function create($values)
    {
        $user_name = $values["user_name"];
        $email = $values["email"];
        $password = $values["password"];
        $verify_password = $values["verify_password"];

         if ($user_name == ""){
            Message::throwMessage("Erro", "0", "O campo usuario deve ser preenchido");
        } else if ($email == ""){
            Message::throwMessage("Erro", "0", "O campo email deve ser preenchido");
        } else if ($password == ""){
            Message::throwMessage("Erro", "0", "O campo senha deve ser preenchido");
        } else if($password != $verify_password) {
            Message::throwMessage("Erro", "0", "As senhas não conferem");
        } else {
            $data = <<<DATA
            {
                "email":"$email",
                "user_name":"$user_name",
                "password":"$password"
            }
            DATA;
            Postman::postPostmanCreate("users", $data);
        }
    }

    public  function get($id)
    {
    }

    public function getByEmail($email)
    {
    }


    public function update($id)
    {
    }

    public function delete()
    {
    }
}
