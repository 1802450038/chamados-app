<?php

namespace cocho\Model;

use cocho\DB\Postman;
use \cocho\Model;


class Board extends Model
{

    public static function listAll()
    {
        $postman = new Postman();

        $response = $postman->getPostmanAll("board");

        if (isset($response[0]["id"])) {
            $response;
        } else {
            $response = "";
        }

        return $response;
    }

    public static  function get($id)
    {
        $postman = new Postman();

        $response = $postman->getPostmanById("board", $id);

        if (isset($response["id"])) {
            $response;
        } else {
            $response = "";
        }

        return $response;
    }


    public static function create($values)
    {

        $boardModelId =  $values["boardModelId"];
        $cochoId =  $values["cochoId"];
        $softwareVersionId =  $values["softwareVersionId"];

        if ($boardModelId == "") {
            Message::throwMessage("Erro", "0", "O campo modelo de placa deve ser selecionado");
        } else if ($cochoId == "") {
            Message::throwMessage("Erro", "0", "O campo cocho deve ser preenchido");
        } else if ($softwareVersionId == "") {
            Message::throwMessage("Erro", "0", "O campo versão do software deve ser preenchido");
        } else {
            $data = <<<DATA
        {
            "boardModelId":"$boardModelId",
            "cochoId":"$cochoId",
            "softwareVersionId":"$softwareVersionId"
        } 
        DATA;
            Postman::postPostmanCreate("board", $data);
        }
    }
}
