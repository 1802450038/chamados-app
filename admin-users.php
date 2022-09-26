<?php

namespace cocho;

use cocho\Model\Call;
use cocho\Model\Os;
use cocho\Model\User;



$app->get('/admin/users', function () {

	User::verifyLogin();

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

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("user-create");
});

$app->get('/admin/user/password-change:id', function ($id) {

	User::verifyLogin();

	$page = new PageAdmin();

	$user = User::get($id);

	$page->setTpl("user-password-change", array(
		"user" => $user
	));
});


$app->get('/admin/user/update:id', function ($id) {

	User::verifyLogin();

	$page = new PageAdmin();

	$user = User::get($id);

	$page->setTpl("user-update", array(
		"user" => $user
	));
});

$app->get('/admin/user/profile:id', function ($id) {

	User::verifyLogin();

	$page = new PageAdmin();

	$user = User::get($id);

	$calls = Call::getByUserId($id);

	$oss = Os::getByUserId($id);

	$user_name = $_SESSION[User::SESSION]["user_name"];
	$user_id = $_SESSION[User::SESSION]["user_id"];
	$is_admin = $_SESSION[User::SESSION]["user_is_admin"];

		foreach ($calls as $index => $call) {
			$calls[$index]["user_name"] = $call["tec1"];
		}
		foreach ($oss as $index => $os) {
			$oss[$index]["user_name"] = $os["tec1"];
		}

	$page->setTpl("user-profile", array(
		"user_id" => $user_id,
		"user_name" => $user_name,
		"is_admin" => $is_admin,
		"user" => $user,
		"calls" => $calls,
		"os" => $oss
	));
});


$app->get('/admin/user/call:idcall/decline:iduser', function ($id_call, $id_user) {

	User::verifyLogin();	

	Call::unsubscribe($id_call);

	header("location: /admin/user/profile$id_user");
	exit;
});


$app->post('/admin/user/create', function () {

	User::verifyLogin();

	$user = new User();

	$user->setData($_POST);

	$id = $user->create();

	header("location: /admin/user/profile$id");
	exit;
});

$app->post('/admin/user/update:id', function ($id) {

	User::verifyLogin();

	$user = new User();

	$user->setData(User::get($id));

	$user->setData($_POST);

	$user->update();

	header("location: /admin/user/profile$id");
	exit;
});


$app->post('/admin/user/password-change:id', function ($id) {

	User::verifyLogin();

	$user = new User();

	$user->setData(User::get($id));

	$user->setData($_POST);

	$user->updateUserPassword();

	header("location: /admin/user/profile$id");
	exit;
});
