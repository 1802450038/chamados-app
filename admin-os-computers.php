<?php

namespace cocho;
use cocho\Model\User;



$app->get('/admin/os-computers', function () {

	// User::verifyLogin();

	$page = new PageAdmin();

	// $users = User::listAll();

	$page->setTpl("os-computers", array(
		
	));
});

$app->get('/admin/os-computer/delete:id', function ($id) {
	

	header("location: /admin/os-computers");
	exit;
});

$app->get('/admin/os-computer/create', function () {

	// User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("os-computer-create");
});

$app->get('/admin/os-computer/update:id', function ($id) {

	// User::verifyLogin();

	$page = new PageAdmin();

	// $users = User::listAll();

	$page->setTpl("os-computer-update", array(
s
	));
});


$app->post('/admin/os-computer/create', function () {

	// User::verifyLogin();

	User::create($_POST);
	
	header("location: /admin/computers");
	exit;
});

$app->post('/admin/os-computer/update', function () {

	// User::verifyLogin();

	User::update($_POST);
	
	header("location: /admin/os-computers");
	exit;
});




?>