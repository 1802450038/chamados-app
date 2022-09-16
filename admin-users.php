<?php

namespace cocho;
use cocho\Model\User;



$app->get('/admin/users', function () {

	// User::verifyLogin();

	$page = new PageAdmin();

	// $users = User::listAll();

	$page->setTpl("users", array(
		
	));
});

$app->get('/admin/user/delete:id', function ($id) {
	

	header("location: /admin/users");
	exit;
});

$app->get('/admin/user/create', function () {

	// User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("user-create");
});

$app->get('/admin/user/update:id', function ($id) {

	// User::verifyLogin();

	$page = new PageAdmin();

	// $users = User::listAll();

	$page->setTpl("user-update", array(
		"users" => $users
	));
});


$app->post('/admin/user/create', function () {

	// User::verifyLogin();

	User::create($_POST);
	
	header("location: /admin/users");
	exit;
});

$app->post('/admin/user/update', function () {

	// User::verifyLogin();

	User::update($_POST);
	
	header("location: /admin/users");
	exit;
});




?>