<?php

namespace cocho;
use cocho\Model\User;
use cocho\Model\Computer;
use cocho\Model\Message;
use cocho\Model\Os;

$app->get('/admin/computers', function () {

	User::verifyLogin();

	$page = new PageAdmin();

	$computers = Computer::listAll();

	$page->setTpl("computers", array(
		"computers"=>$computers
		
	));
});

$app->get('/admin/computer/delete:id', function ($id) {
	
	Computer::delete($id);

	header("location: /admin/computers");
	exit;
});

$app->get('/admin/computer/create', function () {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("computer-create");
});

$app->get('/admin/computer/update:id', function ($id) {

	User::verifyLogin();

	$page = new PageAdmin();

	$computer = new Computer;

	$computer = $computer->get($id);

	$page->setTpl("computer-update", array(
		"computer"=>$computer
	));
});

$app->get('/admin/computer/profile:id', function ($id) {

	User::verifyLogin();

	$page = new PageAdmin();

	$computer = new Computer;

	$computer = $computer->get($id);

	$os = Os::getByComputerId($id);

	$computer["userRegister"] = $userRegister = User::getUserName($computer["user_register_id"]);

	$page->setTpl("computer-profile", array(
		"computer"=>$computer,
		"os"=>$os
	));
});



$app->get('/admin/computer/barcode', function () {

	$page = new PageAdmin();

	$page->setTpl("computer-barcode", array(
		
	));
});


$app->post('/admin/computer/barcode', function () {

	$id = Computer::getIdByPatrimony($_POST['computer_patrimony']);
	if($id != "0"){
		$id = $id["computer_id"];
		header("location: /admin/computer/profile$id");
		exit;
	} else {
		Message::throwMessage("404",0,"Computador não encontrado !");
	}
});


$app->post('/admin/computer/create', function () {

	User::verifyLogin();

	$computer = new Computer();

	$computer->setData($_POST);

	$computer->create();

	
	header("location: /admin/computers");
	exit;
});

$app->post('/admin/computer/update:id', function ($id) {

	User::verifyLogin();

	$computer=  new Computer();

	$computer->setData(Computer::get($id));

	$computer->setData($_POST);

	$computer->update();
	
	header("location: /admin/computers");
	exit;
});




?>