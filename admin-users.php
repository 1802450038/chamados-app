<?php

namespace cocho;
use cocho\Model\User;



$app->get('/admin/users', function () {

	// User::verifyLogin();

	$page = new PageAdmin();

	$users = User::listAll();

	$page->setTpl("users", array(
		"users" => $users
	));
});

$app->get('/admin/user/delete:id', function ($id) {
	
	User::delete($id);

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

	$user = User::get($id);

	$page->setTpl("user-update", array(
		"user"=> $user
	));
});

$app->get('/admin/user/profile:id', function ($id) {

	// User::verifyLogin();

	$page = new PageAdmin();

	$user = User::get($id);

	$chamados = "";
	$osComputers = "";

	$page->setTpl("user-profile", array(
		"user"=>$user,
		"calls"=>$chamados,
		"os"=>$osComputers
	));
});


$app->post('/admin/user/create', function () {

	// User::verifyLogin();
	$user = new User();

	$user->setData($_POST);

	$id = $user->create();

	header("location: /admin/user/profile$id");
	exit;
});

$app->post('/admin/user/update:id', function ($id) {

	// User::verifyLogin();

	$user = new User();

	$user->setData(User::get($id));

	$user->setData($_POST);

	$user->update();
	
	header("location: /admin/user/profile$id");
	exit;
});




?>