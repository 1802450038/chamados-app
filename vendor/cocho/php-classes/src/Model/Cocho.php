<?php

namespace cocho\Model;

use cocho\DB\Postman;
use \cocho\Model;


class Cocho extends Model
{

    public static function listAll()
    {
        $postman = new Postman();

        $response = $postman->getPostmanAll("cocho");

        if (isset($response[0]["id"])) {
            $response;
        } else {
            $response = "";
        }

        return $response;
    }

    public static function create($values)
    {

        $modelId =  $values["modelId"];

        if ($modelId == "") {
            Message::throwMessage("Erro", "0", "O campo cocho ID deve ser preenchido");
        } else {
            $data = <<<DATA
        {
            "modelId":"$modelId"
        } 
        DATA;
            Postman::postPostmanCreate("cocho", $data);
        }
    }

    public static function get($id)
    {
        $postman = new Postman();

        $response = $postman->getPostmanById("cocho", $id);

        if (isset($response["id"])) {
            $response;
        } else {
            $response = "";
        }

        return $response;
    }

}
