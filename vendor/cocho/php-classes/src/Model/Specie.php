<?php

namespace cocho\Model;

use cocho\DB\Postman;
use \cocho\Model;

class Specie extends Model
{

    public static function listAll()
    {
        $postman = new Postman();


        $response = $postman->getPostmanAll("species");

        if (isset($response[0]["id"])) {
            $response;
        } else {
            $response = "";
        }

        return $response;
    }

    public  function get($id)
    {
    }


    public static function create($values)
    {
        $description =  $values["description"];
        $name = $values["name"];

        if ($description == "") {
            Message::throwMessage("Erro", "0", "O campo descrição deve ser preenchido");
        } else if ($name == "") {
            Message::throwMessage("Erro", "0", "O campo nome deve ser preenchido");
        } else {
            $data = <<<DATA
            {
                "description":"$description",
                "name":"$name"
            } 
            DATA;
            Postman::postPostmanCreate("species", $data);
        }
    }

    public function update($id)
    {
    }

    public static function delete($id)
    {

        Postman::postPostmanDelete("species", $id);
    }


    public function getDateForDatabase(string $date): string
    {
        $timestamp = strtotime($date);
        $date_formated = date('Y-m-d', $timestamp);
        return $date_formated;
    }
}
