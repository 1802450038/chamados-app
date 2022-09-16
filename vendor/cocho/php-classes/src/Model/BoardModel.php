<?php

namespace cocho\Model;

use cocho\DB\Postman;
use \cocho\Model;


class BoardModel extends Model
{

    public static function listAll()
    {
        $postman = new Postman();

        $response = $postman->getPostmanAll("boardmodel");

        if (isset($response[0]["id"])) {
            $response;
        } else {
            $response = "";
        }
        return $response;
    }

    public static function create($values)
    {

        $model =  $values["model"];

        if ($model == "") {
            Message::throwMessage("Erro", "0", "O campo versão deve ser preenchido");
        } else {
            $data = <<<DATA
        {
            "model":"$model"
        } 
        DATA;
            Postman::postPostmanCreate("boardmodel", $data);
        }
    }

}
