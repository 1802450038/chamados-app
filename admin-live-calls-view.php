<?php

use cocho\Model\Call;



session_start();
require_once("vendor/autoload.php");


$calls = Call::listAll();


?>

<?php
if($calls){
foreach ($calls as $key => $value) {
?>

    <tr>
        <td>
            <?php echo $value["call_id"] ?>
        </td>
        <td>
            <?php echo $value["call_sector"] ?>
        </td>
        <td>
            <?php echo $value["call_departament"] ?>
        </td>
        <td>
            <?php echo $value["call_issue"] ?>
        </td>

        <td>
        <?php
            if($value['user_name']){ 
        ?>
            <button class="small-action-btn view"> 
            <?php echo $value['user_name']; ?> 
            <i class="fas fa-check"></i>
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
        <td>
            <?php echo date('d/m/y', strtotime($value['call_dt_prev'])); ?>
        </td>
    </tr>


<?php
}} else {
    echo "";
}
?>