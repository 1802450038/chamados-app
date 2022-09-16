<?php

namespace cocho\Model;

use cocho\DB\Postman;
use \cocho\Model;


class CochoModel extends Model
{

    public static function listAll()
    {
        $postman = new Postman();

        $response = $postman->getPostmanAll("cochomodel");

        if (isset($response[0]["id"])) {
            $response;
        } else {
            $response = "";
        }

        return $response;
    }

    
    public static function get($id)
    {
        $postman = new Postman();

        $response = $postman->getPostmanById("cochoModel", $id);

        if (isset($response["id"])) {
            $response;
        } else {
            $response = "";
        }

        return $response;
    }

    public static function create($values)
    {

        $description =  $values["description"];

        if ($description == "") {
            Message::throwMessage("Erro", "0", "O campo descrição deve ser preenchido");
        } else {
            $data = <<<DATA
        {
            "description":"$description"
        } 
        DATA;
            Postman::postPostmanCreate("cochomodel", $data);
        }
    }

}
