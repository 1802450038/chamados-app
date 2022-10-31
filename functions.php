<?php

use cocho\Model\User;


function getUserId()
{
    $user_id = $_SESSION[User::SESSION]["user_id"];
    echo "/admin/user/profile$user_id";
}
function getUserName()
{
    $user_id = $_SESSION[User::SESSION]["user_id"];
    echo $user_id;
}


?>