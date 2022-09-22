<?php

namespace cocho;

use cocho\Model\Computer;
use cocho\Model\Os;
use cocho\Model\User;



$app->get('/admin/os-computers', function () {

	// User::verifyLogin();

	$page = new PageAdmin();

	$os = Os::listAll();


	$page->setTpl("os-computers", array(
		"os"=> $os
	));
});

$app->get('/admin/os-computer/delete:id', function ($id) {
	

	header("location: /admin/os-computers");
	exit;
});

$app->get('/admin/os-computer/create', function () {

	$page = new PageAdmin();

	$tecs = User::listAll();
	$computers = Computer::listAll();

	$page->setTpl("os-computer-create", array(
		"computers" =>$computers,
		"tecs" => $tecs
	));
});

$app->get('/admin/os-computer/create:id', function ($computer_id) {

	$page = new PageAdmin();

	$tecs = User::listAll();

	$computer = Computer::get($computer_id);

	var_dump($computer);

	$page->setTpl("os-computer-create-id", array(
		"computer" =>$computer,
		"tecs" => $tecs
	));
});


$app->get('/admin/os-computer/profile:id', function ($id) {

	$page = new PageAdmin();

	$os = Os::get($id);

	$tecs = User::listAll();

	$page->setTpl("os-computer-profile", array(
		"os" =>$os,
		"tecs" =>$tecs
	));
});

$app->get('/admin/os-computer/update:id', function ($id) {

	// User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("os-computer-update", array(

	));
});




$app->post('/admin/os-computer/create', function () {

	$os = new Os();

	$os->setData($_POST);

	$os->create();

	header("location: /admin/os-computers");
	exit;
});


$app->post('/admin/os-computer/create-id:id', function ($computer_id) {

	// User::verifyLogin();

	$os = new Os();

	$os->setData($_POST);

	$os->create();

	header("location: /admin/computer/profile$computer_id");
	exit;
});


$app->post('/admin/os-computer/update', function () {

	// User::verifyLogin();

	User::update($_POST);
	
	header("location: /admin/os-computers");
	exit;
});


$app->post('/admin/os-computer/status:id', function ($id) {

	// User::verifyLogin();

	$os=  new Os();

	$os->setData(Os::get($id));

	$os->setData($_POST);

	$os->updateStatus();
	
	header("location: /admin/os-computer/profile$id");
	exit;
});




?>