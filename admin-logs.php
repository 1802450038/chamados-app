<?php

namespace cocho;

use cocho\Model\ChatServer;
use cocho\Model\Log;
use cocho\Model\User;



$app->get('/admin/logs', function () {

	User::verifyLogin();

	$page = new PageAdmin();

	$logs = Log::listAll();

	$page->setTpl("logs", array(
		"logs"=>$logs
	));
});

$app->get('/admin/log/view:id', function ($id) {

	User::verifyLogin();

	$page = new PageAdmin();

	$log = Log::get($id);

	$info = "";

	if($log['log_info']);{
		$result = explode(',',$log['log_info']);
		foreach ($result as $key => $value) {
			$info =$info. $value."<br>";
		}
	}

	$log['log_info'] = $info;

	$page->setTpl("log-profile", array(
		"log"=>$log
	));
});


$app->post('/admin/test', function () {

	// User::verifyLogin();

	
	header("location: /admin/test");
	exit;
});




?>