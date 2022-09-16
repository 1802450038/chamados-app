<?php

namespace cocho\Model;

use cocho\DB\Postman;
use \cocho\Model;


class Motor extends Model
{

    public static function listAll()
    {
        $postman = new Postman();

        $response = $postman->getPostmanAll("motor");

        if (isset($response[0]["id"])) {
            $response;
        } else {
            $response = "";
        }

        return $response;
    }

    public static function create($values)
    {

        $boardId =  $values["boardId"];
        $timeToRun =  $values["timeToRun"];
        $useSensor =  $values["useSensor"];

        if ($useSensor == "") {
            Message::throwMessage("Erro", "0", "O campo utiliza sensor deve ser selecionado");
        }
        else if ($timeToRun == "") {
            Message::throwMessage("Erro", "0", "O campo tempo de execução deve ser preenchido");
        }
        else if ($boardId == "") {
            Message::throwMessage("Erro", "0", "O campo board ID deve ser selecionado");
        } else {
            $data = <<<DATA
        {
            "boardId":"$boardId",
            "timeToRun":"$timeToRun",
            "useSensor":"$useSensor"
        } 
        DATA;
            Postman::postPostmanCreate("motor", $data);
        }
    }

    public static function get($id)
    {
        $postman = new Postman();

        $response = $postman->getPostmanById("motor", $id);

        if (isset($response["id"])) {
            $response;
        } else {
            $response = "";
        }

        return $response;
    }
}
