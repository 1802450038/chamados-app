<?php

namespace cocho;
use cocho\Model\User;



$app->get('/admin/calls', function () {

	// User::verifyLogin();

	$page = new PageAdmin();

	// $users = User::listAll();

	$page->setTpl("calls", array(
		
	));
});

$app->get('/admin/call/delete:id', function ($id) {
	

	header("location: /admin/calls");
	exit;
});

$app->get('/admin/call/create', function () {

	// User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("call-create");
});

$app->get('/admin/call/update:id', function ($id) {

	// User::verifyLogin();

	$page = new PageAdmin();

	// $users = User::listAll();

	$page->setTpl("call-update", array(
s
	));
});


$app->post('/admin/call/create', function () {

	// User::verifyLogin();

	User::create($_POST);
	
	header("location: /admin/calls");
	exit;
});

$app->post('/admin/call/update', function () {

	// User::verifyLogin();

	User::update($_POST);
	
	header("location: /admin/calls");
	exit;
});




?>