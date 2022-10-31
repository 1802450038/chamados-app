<?php

use cocho\Model\User;
use cocho\PageAdmin;

session_start();
require_once("vendor/autoload.php");

use Slim\Slim;

$app = new Slim();

$app->config('debug', true);


require_once("functions.php");

require_once("admin-user-actions.php");
require_once("admin-users.php");
require_once("admin-computers.php");
require_once("admin-os-computers.php");
require_once("admin-calls.php");
require_once("admin-logs.php");


// require_once("functions.php");


$app->get('/', function () {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index");
});

$app->get('/admin', function () {

	User::verifyLogin();

	$page = new PageAdmin();

	$user_name = $_SESSION[User::SESSION]["user_name"];
	$user_id = $_SESSION[User::SESSION]["user_id"];
	$is_admin = $_SESSION[User::SESSION]["user_is_admin"];
	$user_super_admin = $_SESSION[User::SESSION]["user_super_admin"];


	// $server->run();

	$page->setTpl("index", array(
		"user_id"=>$user_id,
		"user_name"=>$user_name,
		"is_admin"=>$is_admin,
		"user_super_admin"=>$user_super_admin
	));

});

$app->get("/admin/message", function () {

	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);

	$tipo = $_GET['tipo'];
	$sucesso = $_GET['sucesso'];
	$mensagem = $_GET['mensagem'];

	$page->setTpl("message", array(
		"tipo" => $tipo,
		"resposta" => $mensagem,
		"sucesso" => $sucesso
	));
});


$app->get('/forgot-password', function () {

	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);

	$page->setTpl("forgot");

});


$app->run();
