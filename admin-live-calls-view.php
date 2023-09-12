<?php

use cocho\Model\Call;



session_start();
require_once("vendor/autoload.php");


$calls = Call::listAll();


?>

<?php
if ($calls) {
    foreach ($calls as $key => $value) {
        // echo(explode(" ",$value['user_name'])[0][0] . explode(" ",$value['user_name'])[1][0]);
        // echo(explode(" ",$value['user_name2'])[0][0] . explode(" ",$value['user_name2'])[1][0]);
        // echo(explode(" ",$value['user_name3'])[0][0] . explode(" ",$value['user_name3'])[1][0]);
        
?>

        <tr>
            <td>
                <?php echo $value["call_sector"] ?> |
                <?php echo $value["call_departament"] ?>
            </td>
            <td>
                <?php echo $value["call_caller"] ?>
            </td>
            <td>
                <?php echo $value["call_issue"] ?>
            </td>

            <td>
                <?php
                if ($value['user_name'] != NULL && $value['user_name2'] != NULL && $value['user_name3'] != NULL) {
                ?>
                        <div class="multi-users" style="display: flex; flex-direction: row; justify-content: center; column-gap: 5px;">
                         <button class="small-action-btn view with-img">

                        <?php if ($value['user_profile_picture'] != "/res/_assets/_defaultimg") { ?>
                            <div class="btn-img"><img <?php echo "src= '" . $value['user_profile_picture'] . "';"?>> </div>
                        <?php } else {?>
                           <?php echo(explode(" ",$value['user_name'])[0][0] . explode(" ",$value['user_name'])[1][0]); ?>
                        <?php } ?>

                        </button>
                        <button class="small-action-btn view with-img">
                        <?php if ($value['user_profile_picture2']  != "/res/_assets/_defaultimg") { ?>
                            <div class="btn-img"><img <?php echo "src= '" . $value['user_profile_picture2'] . "';"?>> </div>
                        <?php } else {?>
                           <?php echo(explode(" ",$value['user_name2'])[0][0] . explode(" ",$value['user_name2'])[1][0]); ?>
                        <?php } ?>

                        </button>
                        <button class="small-action-btn view with-img">
                        <?php if ($value['user_profile_picture3']  != "/res/_assets/_defaultimg") { ?>
                            <div class="btn-img"><img <?php echo "src= '" . $value['user_profile_picture3'] . "';"?>> </div>
                        <?php } else {?>
                           <?php echo(explode(" ",$value['user_name3'])[0][0] . explode(" ",$value['user_name3'])[1][0]); ?>
                        <?php } ?>

                        </button>
                        </div>
                <?php
                } elseif ($value['user_name'] != NULL && $value['user_name2']) {
                ?>
                         <div class="multi-users" style="display: flex; flex-direction: row; justify-content: center; column-gap: 5px;">
                        <button  class="small-action-btn view with-img">
                        <?php if ($value['user_profile_picture']  != "/res/_assets/_defaultimg") { ?>
                            <div class="btn-img"><img <?php echo "src= '" . $value['user_profile_picture'] . "';"?>> </div>
                        <?php } else {?>
                           <?php echo(explode(" ",$value['user_name'])[0][0] . explode(" ",$value['user_name'])[1][0]); ?>
                        <?php } ?>

                        </button>
                        <button  class="small-action-btn view with-img">
                        <?php if ($value['user_profile_picture2']  != "/res/_assets/_defaultimg") { ?>
                            <div class="btn-img"><img <?php echo "src= '" . $value['user_profile_picture2'] . "';"?>> </div>
                        <?php } else {?>
                           <?php echo(explode(" ",$value['user_name2'])[0][0] . explode(" ",$value['user_name2'])[1][0]); ?>
                        <?php } ?>

                        </button>
                         </div>
                <?php
                } elseif ($value['user_name'] != NULL) {
                ?>
                       <button style="margin: auto;" class="small-action-btn view with-img">
                        <?php echo $value['user_name']; ?>
                        <?php if ($value['user_profile_picture']  != "/res/_assets/_defaultimg") { ?>
                            <div class="btn-img"><img <?php echo "src= '" . $value['user_profile_picture'] . "';"?>> </div>
                        <?php } else {?>
                           <?php echo(explode(" ",$value['user_name'])[0][0] . explode(" ",$value['user_name'])[1][0]); ?>
                        <?php } ?>

                        </button>
                <?php
                } else {
                ?>
                    <button class="small-action-btn delete">
                        Aberto
                        <i class="fas fa-xmark"></i>
                    </button>
                <?php
                }
                ?>
            </td>

            <td>
                <?php echo date('H:m', strtotime($value['call_dt_register'])); ?>
                <?php echo date('d/m/y', strtotime($value['call_dt_register'])); ?>
            </td>
        </tr>


<?php
    }
} else {
    echo "";
}
?>