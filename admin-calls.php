<?php

namespace cocho;

use cocho\Model\Call;
use cocho\Model\User;



$app->get('/admin/calls', function () {

	User::verifyLogin();

	$page = new PageAdmin();

	$calls = Call::listAll();

	$id_user = $_SESSION[User::SESSION]["user_id"];
	$is_admin = $_SESSION[User::SESSION]["user_is_admin"];

	$page->setTpl("calls", array(
		"calls" => $calls,
		"user" => $id_user,
		"is_admin" => $is_admin
	));
});



$app->get('/admin/get-auto-calls', function () {

	$calls = Call::listAll();

	echo json_encode($calls);
});

$app->get('/admin/auto-calls', function (){

	User::verifyLogin();

	$page = new PageAdmin();

	$calls = Call::listAll();

	$id_user = $_SESSION[User::SESSION]["user_id"];
	$is_admin = $_SESSION[User::SESSION]["user_is_admin"];

	$page->setTpl("calls-auto", array(
		"calls" => $calls,
		"user" => $id_user,
		"is_admin" => $is_admin
	));
});

$app->get('/admin/call/delete:id', function ($id) {
	
	Call::delete($id);

	header("location: /admin/calls");
	exit;
});

$app->get('/admin/call/view:id', function ($id) {

	User::verifyLogin();

	$page = new PageAdmin();

	$call = Call::get($id);

	$id_user = $_SESSION[User::SESSION]["user_id"];

	$page->setTpl("call-profile", array(
		"call"=>$call,
		"user"=>$id_user
	));

});

$app->get('/admin/call/create', function () {

	User::verifyLogin();

	$page = new PageAdmin();

	$users = User::listForTemplate();

	$page->setTpl("call-create", array(
		"users"=> $users
	));

});

$app->get('/admin/call:idcall/done:iduser', function ($id_call, $id_user) {

	User::verifyLogin();	

	Call::finish($id_call);

	header("location: /admin/user/profile$id_user");
	exit;
});

$app->get('/admin/callview:idcall/accept:iduser', function ($id_call, $id_user) {

	User::verifyLogin();	

	Call::subscribe($id_call,$id_user);

	header("location: /admin/call/view$id_call");
	exit;
});


$app->get('/admin/call:idcall/accept:iduser', function ($id_call, $id_user) {

	User::verifyLogin();


	Call::subscribe($id_call,$id_user);

	header("location: /admin/calls");
	exit;
});



$app->get('/admin/call:idcall/decline', function ($id_call) {

	User::verifyLogin();

	Call::unsubscribe($id_call);

	header("location: /admin/calls");
	exit;
});


$app->get('/admin/call/update:id', function ($id) {

	User::verifyLogin();

	$page = new PageAdmin();

	$users = User::listAll();

	$call = Call::get($id);

	$page->setTpl("call-update", array(
		"users"=>$users,
		"call"=> $call
	));
});


$app->post('/admin/call/create', function () {

	$call = new Call();

	$call->setData($_POST);

	$call->create();

	header("location: /admin/calls");
	exit;
});

$app->post('/admin/call/update:id', function ($id) {

	User::verifyLogin();

	$call = new Call();

	$call->setData($call->get($id));

	$call->setData($_POST);

	$user_id = $call->getuser_one_id();
	
	$call->update();

	
	header("location: /admin/user/profile$user_id");
	exit;
});




?>