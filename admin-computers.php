<?php

namespace cocho;

use cocho\Model\User;
use cocho\Model\Computer;
use cocho\Model\Message;
use cocho\Model\Os;

$app->get("/admin/computers", function () {

	User::verifyLogin();

	$patrimony = (isset($_GET['patrimony'])) ? $_GET['patrimony'] : "";
	$sector = (isset($_GET['sector'])) ? $_GET['sector'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$tecs = User::listAll();

	if ($patrimony != '' || $sector != '') {
		$pagination = Computer::getPageSearch($patrimony, $sector, $page);
	} else {

		$pagination = Computer::getPage($page);
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
				'href' => '/admin/computers?' . http_build_query([
					'page' => $x +1,
					'patrimony' => $patrimony,
					'sector' => $sector
				]),
				'text' => $x + 1
			]);
		}
	}

	$page = new PageAdmin();

	$page->setTpl("computers", [
		"computers" => $pagination['data'],
		"patrimony" => $patrimony,
		"sector" => $sector,
		"pages" => $pages,
		"tecs" => $tecs
	]);
});


$app->get('/admin/computers', function () {

	User::verifyLogin();

	$page = new PageAdmin();

	$computers = Computer::listAll();

	$tecs = User::listAll();

	$page->setTpl("computers", array(
		"computers" => $computers,
		"tecs" => $tecs

	));
});


$app->get('/admin/computer/delete:id', function ($id) {

	User::verifyLogin();

	Computer::delete($id);

	header("location: /admin/computers");
	exit;
});

$app->get('/admin/computer/create', function () {

	User::verifyLogin();

	$page = new PageAdmin();

	$user_type = $user_type = $_SESSION[User::SESSION]["user_type"];


	$page->setTpl("computer-create", array(
		"user_type"=>$user_type
	));
});

$app->get('/admin/computer/update:id', function ($id) {

	User::verifyLogin();

	$page = new PageAdmin();

	$computer = new Computer;

	$computer = $computer->get($id);

	$page->setTpl("computer-update", array(
		"computer" => $computer
	));
});

// ADD ADMIN COMPUTER PUBLIC PROFILE


$app->get('/admin/computer/profile:id', function ($id) {

	User::verifyLogin();

	$page = new PageAdmin();

	$computer = new Computer;

	$computer = $computer->get($id);

	$os = Os::getByComputerId($id);

	$user_id = $user_id = $_SESSION[User::SESSION]["user_id"];

	$computer["userRegister"] = $userRegister = User::getUserName($computer["user_register_id"]);

	$page->setTpl("computer-profile", array(
		"computer" => $computer,
		"os" => $os,
		"user_id" => $user_id
	));
});


$app->get('/admin/computer/public-profile:id', function ($id) {

	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);

	$computer = new Computer;

	$computer = $computer->get($id);

	$os = Os::getByComputerId($id);

	$computer["userRegister"] = $userRegister = User::getUserName($computer["user_register_id"]);

	$page->setTpl("computer-public-profile", array(
		"computer" => $computer,
		"os" => $os
	));
});



$app->get('/admin/computer/barcode', function () {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("computer-barcode", array());
});



$app->get('/admin/computer/public-barcode', function () {

	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);

	$page->setTpl("computer-public-barcode", array());
});


$app->post('/admin/computer/barcode', function () {

	$id = Computer::getIdByPatrimony($_POST['computer_patrimony']);

	if ($id != "0") {
		
		header("location: /admin/computer/profile$id");
		exit;
	} else {
		Message::throwMessage("404", 0, "Computador não encontrado !");
	}
});

$app->post('/admin/computer/public-barcode', function () {

	$id = Computer::getIdByPatrimony($_POST['computer_patrimony']);
	if ($id != "0") {

		header("location: /admin/computer/public-profile$id");
		exit;
	} else {
		Message::throwMessage("404", 0, "Computador não encontrado !");
	}
});


















$app->post('/admin/computer/create', function () {
 
	User::verifyLogin();


	$computer = new Computer();

	// var_dump($_POST);
	
	if(!isset($_POST['computer_ip'])){
		$_POST['computer_ip'] = '';
		$_POST['computer_user_name'] = '';
		$_POST['computer_user_registration'] = '';
		$_POST['computer_brand'] = '';
		$_POST['computer_soc'] = '';
		$_POST['computer_mem'] = '';
		$_POST['computer_video_card'] = '';
		$_POST['computer_network_card'] = '';
		$_POST['computer_hd'] = '';
		$_POST['computer_hd_type'] = '';
		$_POST['computer_state'] = '';
	}
	
	
	$computer->setData($_POST);
	

	$computer_id = Computer::getIdByPatrimony($_POST['computer_patrimony']);

	

	if($computer_id > 0){
		header("location: /admin/os-computer/create$computer_id");
		exit;
		
	} else {
		$computer->create();
	}
	


	header("location: /admin/computers");
	exit;
});

$app->post('/admin/computer/update:id', function ($id) {

	User::verifyLogin();

	$computer =  new Computer();

	$computer->setData(Computer::get($id));

	$computer->setData($_POST);

	$computer->update();

	header("location: /admin/computers");
	exit;
});
