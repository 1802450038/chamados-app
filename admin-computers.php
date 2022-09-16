<?php

namespace cocho;
use cocho\Model\User;



$app->get('/admin/computers', function () {

	// User::verifyLogin();

	$page = new PageAdmin();

	// $users = User::listAll();

	$page->setTpl("computers", array(
		
	));
});

$app->get('/admin/computer/delete:id', function ($id) {
	

	header("location: /admin/computers");
	exit;
});

$app->get('/admin/computer/create', function () {

	// User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("computer-create");
});

$app->get('/admin/computer/update:id', function ($id) {

	// User::verifyLogin();

	$page = new PageAdmin();

	// $users = User::listAll();

	$page->setTpl("computer-update", array(
s
	));
});


$app->post('/admin/computer/create', function () {

	// User::verifyLogin();

	User::create($_POST);
	
	header("location: /admin/computers");
	exit;
});

$app->post('/admin/computer/update', function () {

	// User::verifyLogin();

	User::update($_POST);
	
	header("location: /admin/computers");
	exit;
});




?>