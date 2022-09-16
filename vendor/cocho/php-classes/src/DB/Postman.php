<?php

namespace cocho\DB;

use cocho\Model\User;

class Postman
{

    public function getPostmanAll($location)
    {

        $key = $_SESSION[User::SESSION]["token"];

        $url = "https://apicocho.eduardovilhalba.me/$location";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer $key",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = json_decode(curl_exec($curl), true);

        curl_close($curl);

        return $response;
    }


    public function getPostmanById($location, $id)
    {

        $key = $_SESSION[User::SESSION]["token"];

        $url = "https://apicocho.eduardovilhalba.me/$location/$id";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer $key"
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = json_decode(curl_exec($curl), true);

        curl_close($curl);

        return $response;
    }


    public static function postPostmanCreate($location, $data)
    {
        $key = $_SESSION[User::SESSION]["token"];


        $url = "https://apicocho.eduardovilhalba.me/$location";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer $key",
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);


        $resp = json_decode(curl_exec($curl), true);

        curl_close($curl);

        return $resp;
    }


    public static function postPostmanDelete($location, $id)
    {

        $key = $_SESSION[User::SESSION]["token"];

        $url = "https://apicocho.eduardovilhalba.me/$location/$id";

  
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Authorization: Bearer $key"
        );

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


        $resp = json_decode(curl_exec($ch), true);

        curl_close($ch);

        return $resp;
    }

    public static function postPostmanLogin($login, $password)
    {
        $url = "https://apicocho.eduardovilhalba.me/auth";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $data = <<<DATA
        {
            "user_name":"$login",
            "password":"$password"
        }
        DATA;

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $resp = json_decode(curl_exec($curl), true);

        curl_close($curl);

        return $resp;
    }
}
