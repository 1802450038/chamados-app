<?php

use cocho\Model\Call;



session_start();
require_once("vendor/autoload.php");


$calls = Call::listAll();


?>

<?php

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

        <td><button class="small-action-btn view"> 
            <?php echo $value['user_name']; ?> 
            <i class="fas fa-check"></i>
        </button>
        </td>

        <td>
            <?php echo date('H:m', strtotime($value['call_dt_register'])); ?>
        </td>
        <td>
            <?php echo date('d/m/y', strtotime($value['call_dt_register'])); ?>
        </td>
    </tr>


<?php
}
?>