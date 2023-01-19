<?php

namespace cocho;

use cocho\Model\Call;
use cocho\Model\Message;
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

	User::verifyLogin();

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

	$is_super = $_SESSION[User::SESSION]['user_super_admin'];

	$page->setTpl("user-update", array(
		"user" => $user,
		"super" => $is_super
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
	$is_super = $_SESSION[User::SESSION]['user_super_admin'];

	if ($calls > 0) {
		foreach ($calls['data'] as $index => $call) {
			$calls['data'][$index]["user_name"] = $call["tec1"];
		}
	} else {
		$calls = [
			'data' => "",
			'total' => 0,
			'totalCount' => 0,
			'percent'=> 0
		];
	}

	if ($oss > 0) {
		foreach ($oss['data'] as $index => $os) {
			$oss['data'][$index]["user_name"] = $os["tec1"];
		}
	} else {
		$oss = [
			'data'=>"",
			'total'=>0,
			'totalCount'=>0,
			'percent'=> 0
		];
	}


	$page->setTpl("user-profile", array(
		"user_id" => $user_id,
		"user_name" => $user_name,
		"is_admin" => $is_admin,
		"super" => $is_super,
		"user" => $user,
		"calls" => $calls['data'],
		"os" => $oss['data'],
		"totalOs"=>$oss['total'],
		"totalCountOs"=> $oss['totalCount'],
		"percentOs"=> $oss['percent'],
		"totalCall"=>$calls['total'],
		"totalCountCall"=> $calls['totalCount'],
		"percentCall"=> $calls['percent']
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

	$user->create();

	header("location: /admin/users");
	exit;
});


$app->post('/admin/user/update:id', function ($id) {

	User::verifyLogin();

	$user = new User();

	$user->setData(User::get($id));

	$user->setData($_POST);

	if($_FILES['fileUpload']['name'] == ''){
		$user->checkphoto(); 
	} else {
		$user->setPhoto($_FILES);
	}
	
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


$app->post('/forgot-password', function () {


	echo "aaaaaaaa";



	if ($user = User::getByEmail($_POST["user_email"]) == 0) {
		Message::throwMessage("Erro", "0", "Usuario não encontrado");
	} else {
		Message::throwMessage("Sucesso", "1", "Email enviado com sucesso !");
	}

	// var_dump($user);
	// User::verifyLogin();

	// $user = new User();

	// $user->setData(User::get($id));

	// $user->setData($_POST);

	// $user->updateUserPassword();

	// header("location: /admin/user/profile$id");
	// exit;
});
