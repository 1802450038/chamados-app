<?php

namespace cocho;

use cocho\Model\Computer;
use cocho\Model\Os;
use cocho\Model\User;



$app->get('/admin/os-computers', function () {

	User::verifyLogin();

	$page = new PageAdmin();

	$os = Os::listAll();

	$user_id = $_SESSION[User::SESSION]["user_id"];

	$page->setTpl("os-computers", array(
		"os" => $os,
		"user_id" => $user_id
	));
});

$app->get('/admin/os-computer/delete:id', function ($id) {

	User::verifyLogin();

	Os::delete($id);

	header("location: /admin/os-computers");
	exit;
});

$app->get('/admin/os-computer/create:id', function () {

	User::verifyLogin();

	$page = new PageAdmin();

	$tecs = User::listAll();
	$computers = Computer::listAll();
	$user_id = $_SESSION[User::SESSION]["user_id"];
	$user_name = $_SESSION[User::SESSION]["user_name"];

	$page->setTpl("os-computer-create", array(
		"computers" => $computers,
		"tecs" => $tecs,
		"user_id" => $user_id,
		"user_name" => $user_name
	));
});

$app->get('/admin/os-computer/create', function () {

	User::verifyLogin();

	$page = new PageAdmin();

	$tecs = User::listAll();
	$computers = Computer::listAll();
	$user_id = $_SESSION[User::SESSION]["user_id"];
	$user_name = $_SESSION[User::SESSION]["user_name"];

	$page->setTpl("os-computer-create", array(
		"computers" => $computers,
		"tecs" => $tecs,
		"user_id" => $user_id,
		"user_name" => $user_name
	));
});


$app->get('/admin/os-computer/profile:id', function ($id) {

	User::verifyLogin();

	$page = new PageAdmin();

	$os = Os::get($id);

	$tecs = User::listAll();
	$user_id = $_SESSION[User::SESSION]["user_id"];

	$page->setTpl("os-computer-profile", array(
		"os" => $os,
		"tecs" => $tecs,
		"user_id" => $user_id
	));
});

$app->get('/admin/os-computer/update:id', function ($id) {

	User::verifyLogin();

	$page = new PageAdmin();

	$os = Os::get($id);

	$tecs = User::listAll();

	$user_id = $_SESSION[User::SESSION]["user_id"];
	$user_name = $_SESSION[User::SESSION]["user_name"];

	$page->setTpl("os-computer-update", array(
		"os" => $os,
		"tecs" => $tecs,
		"user_id" => $user_id,
		"user_name" => $user_name

	));
});

$app->post('/admin/os-computer/create', function () {

	User::verifyLogin();

	$os = new Os();

	$os->setData($_POST);

	$os->create();

	header("location: /admin/os-computers");
	exit;
});


$app->post('/admin/os-computer/create-id:id', function ($computer_id) {

	User::verifyLogin();

	$os = new Os();

	$os->setData($_POST);

	$os->create();

	header("location: /admin/computer/profile$computer_id");
	exit;
});


$app->post('/admin/os-computer/update:id', function ($id) {

	User::verifyLogin();

	$os = new Os();

	$os->setData(Os::get($id));

	$os->setData($_POST);

	$os->update();

	header("location: /admin/os-computers");
	exit;
});


$app->post('/admin/os-computer/status:id', function ($id) {

	User::verifyLogin();

	$os =  new Os();

	$os->setData(Os::get($id));

	$os->setData($_POST);

	$os->updateStatus();

	header("location: /admin/os-computer/profile$id");
	exit;
});
