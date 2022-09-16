<?php

namespace cocho\Model;

use cocho\DB\Postman;
use \cocho\Model;


class Animal extends Model
{

    public static function listAll()
    {
        $postman = new Postman();

        $response = $postman->getPostmanAll("animals");

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

        $response = $postman->getPostmanById("animals", $id);

        if (isset($response["id"])) {
            $response;
        } else {
            $response = "";
        }

        return $response;
    }


    public static function create($values)
    {

        $tag =  $values["tag"];
        $speciesId = $values["speciesId"];

        if ($tag == "") {
            Message::throwMessage("Erro", "0", "O campo tag deve ser preenchido");
        } else if ($speciesId == "") {
            Message::throwMessage("Erro", "0", "A especie deve ser selecionada");
        } else {
            $data = <<<DATA
        {
            "tag":"$tag",
            "speciesId":"$speciesId"
        } 
        DATA;
            Postman::postPostmanCreate("animals", $data);
        }
    }

    public function update($id)
    {
    }

    public static function delete($id)
    {

        Postman::postPostmanDelete("animals", $id);
    }


    public function getDateForDatabase(string $date): string
    {
        $timestamp = strtotime($date);
        $date_formated = date('Y-m-d', $timestamp);
        return $date_formated;
    }
}
