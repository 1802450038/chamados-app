<?php

use cocho\Model\Call;
use cocho\Model\User;


session_start();
require_once("vendor/autoload.php");

$user_name = $_SESSION[User::SESSION]["user_name"];
$user_id = $_SESSION[User::SESSION]["user_id"];
$is_admin = $_SESSION[User::SESSION]["user_is_admin"];
$user_type = $_SESSION[User::SESSION]["user_type"];


$calls = Call::listAll();




?>

<?php
if($calls){
foreach ($calls as $key => $value) {
?>

    <tr>
        <td>
            <?php echo $value["call_sector"] .  " - " .$value["call_departament"] ?>
        </td>
        <td>
            <?php echo $value["call_issue"] ?>
        </td>

        <?php if ($value["call_status"] == 'CONCLUIDO') { ?>
            <td>
                <div class="small-action-btn confirm">Concluido</div>
            </td>
        <?php } else { ?>


            <?php if ($value['user_name']) { ?>
                <?php if ($value['user_one_id'] == $user_id) { ?>
                    <td>
                        <a <?php echo "href='/admin/call" . $value["call_id"] . "/decline'"; ?> onclick="return confirm('Deseja realmente cancelar a inscrição?')" class="small-action-btn delete">Cancelar</a>
                    </td>
                <?php } else { ?>
                    <td>
                        <button class="small-action-btn view with-img"> 
                            <?php echo $value['user_name']; ?>
                            <?php if ($value['user_profile_picture']) { ?>
                                    <div class="btn-img"><img <?php echo "src= '". $value['user_profile_picture']."';" ?> > </div>
                            <?php }
                            ?>
                        </button>
                    </td>
                <?php } ?>

            <?php } else { ?>

                <td>
                    <a <?php echo "href='/admin/call" . $value["call_id"] . "/accept" . $user_id . "'"; ?> onclick="return confirm('Deseja realmente aceitar essa solicitação?')" class="small-action-btn done">Aceitar</a>
                </td>

            <?php } ?>

        <?php } ?>




        <td>
            <?php echo date('H:m', strtotime($value['call_dt_register'])); ?>
            <?php echo date('d/m/y', strtotime($value['call_dt_register'])); ?>
        </td>
        <td>
            <?php echo date('d/m/y', strtotime($value['call_dt_prev'])); ?>
        </td>

        <td>
        <?php
            
            if ($user_type == "atendimento" && $value["user_one_id"] != 0 || $user_id == $value["user_one_id"]) {
            ?>
                
                <a <?php echo "href='/admin/call" . $value["call_id"] . "/sec-done". $value["user_one_id"] . "'" ?>
                                            onclick="return confirm('Deseja realmente finalizar este chamado ?')"
                                            class="small-action-btn confirm"><i class="fas fa-check"></i></a>
            <?php
            }
            ?>

            <?php
            if ($value["user_one_id"] == 0) {
            ?>
                <a <?php echo "href='/admin/call/delete" . $value["call_id"] . "'"; ?> onclick="return confirm('Deseja realmente deletar essa solicitação?')" class="small-action-btn delete"><i class="fas fa-trash-can"></i></a>
            <?php
            }
            ?>
            <?php
            if ($value["user_one_id"] == 0) {
            ?>
                <a <?php echo "href='/admin/call/update" . $value["call_id"] . "'"; ?> class="small-action-btn update"><i class="fas fa-pen-to-square"></i></a>
            <?php
            }
            ?>
            <a <?php echo "href='/admin/call/view" . $value["call_id"] . "'"; ?> class="small-action-btn view"><i class="fas fa-eye"></i></a>
        </td>


    </tr>

    <?php
}} else {
    echo "";
}
?>