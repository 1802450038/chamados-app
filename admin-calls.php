<?php

namespace cocho;

use cocho\Model\Call;
use cocho\Model\User;


$app->get('/admin/calls', function () {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("calls-live");
});

$app->get('/admin/calls/live', function () {

	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);
	$page->setTpl("calls-live-view");
});

$app->get('/admin/calls-history', function () {

	User::verifyLogin();

	$user_name = $_SESSION[User::SESSION]["user_name"];
	$user_id = $_SESSION[User::SESSION]["user_id"];
	$is_admin = $_SESSION[User::SESSION]["user_is_admin"];


	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Call::getPageSearch($search, $page);
	} else {

		$pagination = Call::getPage($page);
	}

	$pages = [];

	$total = $pagination['pages'];

	$extra = 2;

	if($page == 1) {
		$extra = 5;
	}

	for ($x = $page - 3; $x < $page + $extra; $x++) {
		if ($x >= 0 && $x < $total) {

			array_push($pages, [
				'href' => '/admin/calls-history?' . http_build_query([
					'page' => $x +1,
					'search' => $search
				]),
				'text' => $x + 1
			]);
		}
	}

	$page = new PageAdmin();

	

	$page->setTpl("calls", array(
		"calls" => $pagination['data'],
		"search" => $search,
		"pages" => $pages,
		"user" => $user_id
	));
});


$app->get('/admin/call/delete:id', function ($id) {
	
	User::verifyLogin();
	
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

$app->get('/admin/call:idcall/sec-done:iduser', function ($id_call, $id_user) {

	User::verifyLogin();	

	Call::finish($id_call);

	header("location: /admin/calls");
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

	User::verifyLogin();
	
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
	
	$call->update();

	
	header("location: /admin/calls");
	exit;
});
