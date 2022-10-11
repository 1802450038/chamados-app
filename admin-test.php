<?php

namespace cocho;

use cocho\Model\ChatServer;
use cocho\Model\User;



$app->get('/admin/test', function () {

	// User::verifyLogin();

	$page = new PageAdmin();

	// $id_user = $_SESSION[User::SESSION]["user_id"];
	// $is_admin = $_SESSION[User::SESSION]["user_is_admin"];

	$chatServer = new ChatServer();


	$page->setTpl("test");
});


$app->post('/admin/test', function () {

	// User::verifyLogin();

	
	header("location: /admin/test");
	exit;
});




?>