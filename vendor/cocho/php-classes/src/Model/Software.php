<?php

namespace cocho\Model;

use cocho\DB\Postman;
use \cocho\Model;


class Software extends Model
{

    public static function listAll()
    {
        $postman = new Postman();

        $response = $postman->getPostmanAll("softwareversion");

        if (isset($response[0]["id"])) {
            $response;
        } else {
            $response = "";
        }

        return $response;
    }

    public static function create($values)
    {

        $version =  $values["version"];

        if ($version == "") {
            Message::throwMessage("Erro", "0", "O campo versão deve ser preenchido");
        } else {
            $data = <<<DATA
        {
            "version":"$version"
        } 
        DATA;
            Postman::postPostmanCreate("softwareversion", $data);
        }
    }

}
